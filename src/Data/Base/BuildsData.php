<?php

namespace Jasara\AmznSPA\Data\Base;

use Jasara\AmznSPA\Data\Base\Casts\Caster;

trait BuildsData
{
    private static function buildObject(string $class, array $payload): static
    {
        $reflection = new \ReflectionClass($class);
        $constructor = $reflection->getConstructor();
        if (is_null($constructor)) {
            return new $class();
        }

        $parameters = $constructor->getParameters();
        $arguments = [];

        foreach ($parameters as $parameter) {
            $arguments[$parameter->getName()] = self::getParameterValue($parameter, $payload);
        }

        return new $class(...$arguments);
    }

    private static function getParameterValue(
        \ReflectionParameter $parameter,
        array $payload,
    ): mixed {
        $payload_value = $payload[$parameter->getName()] ?? null;

        if ($payload_value === null) {
            if ($parameter->isOptional() || $parameter->allowsNull()) {
                return null;
            }

            throw new \InvalidArgumentException("Missing required parameter: {$parameter->getName()} for {$parameter->getDeclaringClass()->getName()}");
        }

        if ($parameter->getType() instanceof \ReflectionUnionType) {
            foreach ($parameter->getType()->getTypes() as $type) {
                if ($type->getName() === 'null') {
                    continue;
                }

                try {
                    return self::getValueFromNamedType($type, $payload_value);
                } catch (\InvalidArgumentException) {
                    continue;
                }
            }

            throw new \InvalidArgumentException("Unsupported parameter union for: {$parameter->getName()}");
        }

        $caster = $parameter->getAttributes(Caster::class, \ReflectionAttribute::IS_INSTANCEOF);
        if (count($caster)) {
            $caster = $caster[0]->newInstance();

            return $caster->cast($payload_value);
        }

        return self::getValueFromNamedType($parameter->getType()->getName(), $payload_value);
    }

    private static function getValueFromNamedType(
        string $type_name,
        mixed $payload_value,
    ): mixed {
        return match (true) {
            is_a($type_name, Data::class, true) => $type_name::from($payload_value),
            is_a($type_name, TypedCollection::class, true) => self::getTypedCollectionValue($type_name, $payload_value),
            $type_name === 'int' => (int) $payload_value,
            $type_name === 'string' => (string) $payload_value,
            $type_name === 'array' => (array) $payload_value,
            default => throw new \InvalidArgumentException("Unsupported parameter type: {$type_name} with value: {$payload_value}"),
        };
    }

    /**
     * @param class-string<TypedCollection> $type_name
     */
    private static function getTypedCollectionValue(
        string $type_name,
        mixed $payload_value,
    ): TypedCollection {
        if (!is_iterable($payload_value)) {
            throw new \InvalidArgumentException("Expected iterable for collection parameter: {$type_name}");
        }

        $collection_values = [];
        foreach ($payload_value as $raw_value) {
            $collection_values[] = self::getValueFromNamedType($type_name::ITEM_CLASS, $raw_value);
        }

        return $type_name::make($collection_values);
    }
}
