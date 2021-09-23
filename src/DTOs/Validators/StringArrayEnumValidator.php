<?php

namespace Jasara\AmznSPA\DTOs\Validators;

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
        foreach ($value as $string) {
            if (! in_array($string, $this->enum)) {
                return ValidationResult::invalid($string . ' is not an allowed result. Valid values are: ' . implode(',', $this->enum));
            }
        }

        return ValidationResult::valid();
    }
}
