<?php

namespace Jasara\AmznSPA\Data\Base;

use BackedEnum;
use Illuminate\Support\Collection;
use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Base\Casts\Caster;
use ReflectionParameter;

/**
 * @template TClass of Data
 */
class DataBuilder
{
    /**
     * @param class-string<TClass> $class
     */
    public function __construct(
        private string $class,
        private array $payload,
    ) {
    }

    /**
     * @return TClass
     *
     * This method will:
     * 1. Return a new instance of the class if it has no constructor
     * 2. For flat responses, it will map the response to the parameter defined in the class
     * 3. For named parameters, it will try to cast the value to the parameter type
     */
    public function build(): Data
    {
        $reflection = new \ReflectionClass($this->class);
        $constructor = $reflection->getConstructor();
        if (is_null($constructor)) {
            return new $this->class();
        }

        $parameters = $constructor->getParameters();

        if (is_a($this->class, IsFlatResponse::class, true)) {
            return $this->buildFlatResponse(...$parameters);
        }

        $arguments = [];
        foreach ($parameters as $parameter) {
            $arguments[$parameter->getName()] = self::getParameterValue($parameter, $this->payload);
        }

        return new $this->class(...$arguments);
    }

    /**
     * This method will:
     * 1. Get the value from the payload for the parameter
     * 2. Cast the value if a caster is defined
     * 3. If the parameter is a union type, it will try to cast the value to each type until it finds a match
     * 4. If the parameter is a named type, it will cast the value to that type
     */
    private function getParameterValue(
        ReflectionParameter $parameter,
        array $payload,
    ): mixed {
        $payload_value = $payload[$parameter->getName()] ?? null;

        $payload_value = $this->processCasters($parameter, $payload_value);

        if ($this->shouldBeNull($parameter, $payload_value)) {
            return null;
        }

        if ($parameter->getType() instanceof \ReflectionUnionType) {
            $types = array_filter(
                $parameter->getType()->getTypes(),
                fn ($type) => $type->getName() !== 'null',
            );
            foreach ($types as $type) {
                try {
                    return self::getValueFromNamedType($type, $payload_value);
                } catch (\Throwable) {
                    continue;
                }
            }

            throw new \InvalidArgumentException("Unsupported parameter union for: {$parameter->getName()}"); // @codeCoverageIgnore
        }

        return self::getValueFromNamedType($parameter->getType()->getName(), $payload_value);
    }

    private function getValueFromNamedType(
        string $type_name,
        mixed $payload_value,
    ): mixed {
        return match (true) {
            is_a($type_name, Data::class, true) => $type_name::from($payload_value),
            is_a($type_name, BackedEnum::class, true) => $type_name::from($payload_value),
            is_a($type_name, TypedCollection::class, true) => self::getTypedCollectionValue($type_name, $payload_value),
            is_a($type_name, Collection::class, true) => $type_name::make($payload_value),
            $type_name === 'int' => (int) $payload_value,
            $type_name === 'float' => (float) $payload_value,
            $type_name === 'string' => (string) $payload_value,
            $type_name === 'array' => (array) $payload_value,
            $type_name === 'bool' => (bool) $payload_value,
            is_a($payload_value, $type_name, true) => $payload_value,
            default => throw new \InvalidArgumentException("Unsupported parameter type: {$type_name} with value: {$payload_value} for class {$this->class}"),
        };
    }

    /**
     * @param class-string<TypedCollection> $type_name
     */
    private function getTypedCollectionValue(
        string $type_name,
        mixed $payload_value,
    ): TypedCollection {
        if (! is_iterable($payload_value)) {
            throw new \InvalidArgumentException("Expected iterable for collection parameter: {$type_name}");
        }

        $collection_values = [];
        foreach ($payload_value as $raw_value) {
            $collection_values[] = self::getValueFromNamedType($type_name::ITEM_CLASS, $raw_value);
        }

        return $type_name::make($collection_values);
    }

    private function buildFlatResponse(
        ReflectionParameter ...$parameters,
    ): Data {
        $map_to_parameter = $this->class::mapResponseToParameter();

        $parameter = array_filter($parameters, fn ($parameter) => $parameter->getName() === $map_to_parameter)[0] ?? null;

        if (! $parameter) {
            throw new \InvalidArgumentException("Missing required parameter: {$map_to_parameter} for {$this->class}");
        }

        // Return an empty response on flat response classes
        if ($parameter->allowsNull() && array_keys($this->payload) === ['errors']) {
            return new $this->class(...[
                $this->class::mapResponseToParameter() => null,
            ]);
        }

        return new $this->class(...[
            $this->class::mapResponseToParameter() => (new self($parameter->getType()->getName(), $this->payload))->build(),
        ]);
    }

    private function processCasters(
        ReflectionParameter $parameter,
        mixed $payload_value,
    ): mixed {
        $caster = $parameter->getAttributes(Caster::class, \ReflectionAttribute::IS_INSTANCEOF);
        if (count($caster)) {
            $caster = $caster[0]->newInstance();

            $payload_value = $caster->cast($payload_value);
        }

        return $payload_value;
    }

    private function shouldBeNull(
        ReflectionParameter $parameter,
        mixed $payload_value,
    ): bool {
        if (! $parameter->allowsNull() && $payload_value === null) {
            throw new \InvalidArgumentException("Missing required parameter: {$parameter->getName()} for {$parameter->getDeclaringClass()->getName()}");
        }

        if (! $parameter->allowsNull()) {
            return false;
        }

        if ($payload_value === null) {
            return true;
        }

        $is_empty_array = is_array($payload_value) && count($payload_value) === 0;

        if (! $is_empty_array) {
            return false;
        }

        $param_is_iterable = is_a($parameter->getType()->getName(), \Iterator::class, true) || is_a($parameter->getType()->getName(), \IteratorAggregate::class, true);

        if (! $param_is_iterable) {
            return true;
        }

        return false;
    }
}
