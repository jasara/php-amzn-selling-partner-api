<?php

namespace Jasara\AmznSPA\Data\Base;

use Illuminate\Support\Collection;

trait BuildsData
{
    private static function buildObject(string $class, array $payload): static
    {
        $reflection = new \ReflectionClass($class);
        $constructor = $reflection->getConstructor();
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

            throw new \InvalidArgumentException("Missing required parameter: {$parameter->getName()}");
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

        return self::getValueFromNamedType($parameter->getType(), $payload_value);
    }

    private static function getValueFromNamedType(
        \ReflectionNamedType $type,
        mixed $payload_value,
    ): mixed {
        return match (true) {
            is_a($type->getName(), Data::class, true) => $type->getName()::from($payload_value),
            is_a($type->getName(), Collection::class, true) => $type->getName()::make($payload_value),
            $type->getName() === 'int' => (int) $payload_value,
            $type->getName() === 'string' => (string) $payload_value,
            $type->getName() === 'array' => (array) $payload_value,
            default => throw new \InvalidArgumentException("Unsupported parameter type: {$type->getName()}"),
        };
    }
}
