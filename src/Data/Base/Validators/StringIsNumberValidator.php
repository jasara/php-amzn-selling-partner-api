<?php

namespace Jasara\AmznSPA\Data\Base\Validators;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::IS_REPEATABLE)]
class StringIsNumberValidator implements Validator
{
    public function validate(mixed $value): void
    {
        if (!is_numeric($value)) {
            throw new DataValidationException($value.' is not numeric.');
        }
    }
}
