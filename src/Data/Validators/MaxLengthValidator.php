<?php

namespace Jasara\AmznSPA\Data\Validators;

use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::IS_REPEATABLE)]
class MaxLengthValidator implements Validator
{
    public function __construct(
        private int $max_length,
    ) {
    }

    public function validate(mixed $value): ValidationResult
    {
        if (is_null($value)) {
            return ValidationResult::valid();
        }
        if (mb_strlen($value) > $this->max_length) {
            return ValidationResult::invalid("The length of the string: '{$value}' should be than or equal to {$this->max_length}. Current length: ".strlen($value));
        }

        return ValidationResult::valid();
    }
}
