<?php

namespace Jasara\AmznSPA\Data\Base\Validators;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::IS_REPEATABLE)]
class MaxLengthValidator implements Validator
{
    public function __construct(
        private int $max_length,
    ) {
    }

    public function validate(mixed $value): void
    {
        if (is_null($value)) {
            return;
        }

        if (mb_strlen($value) > $this->max_length) {
            throw new DataValidationException("The length of the string: '{$value}' should be than or equal to {$this->max_length}. Current length: " . strlen($value));
        }
    }
}
