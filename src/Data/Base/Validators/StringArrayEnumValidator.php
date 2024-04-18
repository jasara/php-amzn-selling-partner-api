<?php

namespace Jasara\AmznSPA\Data\Base\Validators;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::IS_REPEATABLE)]
class StringArrayEnumValidator implements Validator
{
    public function __construct(
        private array $enum,
    ) {
    }

    public function validate(mixed $value): void
    {
        if (is_null($value)) {
            return;
        }

        $this->validateArray($value, $this->enum);
    }

    private function validateArray(array $array, array $allowed_values): void
    {
        foreach ($array as $string) {
            if (! in_array($string, $allowed_values)) {
                throw new DataValidationException($string . ' is not an allowed result. Valid values are: ' . implode(',', $allowed_values));
            }
        }
    }
}
