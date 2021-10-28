<?php

namespace Jasara\AmznSPA\DataTransferObjects\Validators;

use Attribute;
use Jasara\AmznSPA\Traits\ValidatesParameters;
use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class StringArrayEnumValidator implements Validator
{
    use ValidatesParameters;

    public function __construct(
        private array $enum,
    ) {
    }

    public function validate(mixed $value): ValidationResult
    {
        if (is_null($value)) {
            return ValidationResult::valid();
        }

        return $this->validateArray($value, $this->enum);
    }

    private function validateArray(array $array, array $allowed_values): ValidationResult
    {
        foreach ($array as $string) {
            if (! in_array($string, $allowed_values)) {
                return ValidationResult::invalid($string . ' is not an allowed result. Valid values are: ' . implode(',', $allowed_values));
            }
        }

        return ValidationResult::valid();
    }
}
