<?php

namespace Jasara\AmznSPA\DataTransferObjects\Casts;

use BackedEnum;
use Spatie\DataTransferObject\Caster;

class BackedEnumCaster implements Caster
{
    private string $enum_class;

    public function __construct(
        array $caster_arguments,
    ) {
        $this->enum_class = $caster_arguments[0];

        if (! enum_exists($this->enum_class)) {
            throw new \Exception('The provided class is not an enum');
        }
    }

    public function cast(mixed $value): BackedEnum
    {
        if ($value instanceof BackedEnum) {
            if (get_class($value) === $this->enum_class) {
                return $value;
            }
        }

        if (! is_string($value) && ! is_int($value)) {
            throw new \Exception('Cannot cast values that are not strings or integers to a backed Enum');
        }

        return $this->enum_class::from($value);
    }
}
