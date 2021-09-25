<?php

namespace Jasara\AmznSPA\DataTransferObjects\Validators;

use Attribute;
use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class StringIsNumberValidator implements Validator
{
    public function validate(mixed $value): ValidationResult
    {
        if (! is_numeric($value)) {
            return ValidationResult::invalid($value . ' is not numeric.');
        }

        return ValidationResult::valid();
    }
}
