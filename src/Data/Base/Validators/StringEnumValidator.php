<?php

namespace Jasara\AmznSPA\Data\Base\Validators;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::IS_REPEATABLE)]
class StringEnumValidator implements Validator
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

        if (!in_array($value, $this->enum)) {
            throw new DataValidationException($value.' is not an allowed result. Valid values are: '.implode(',', $this->enum));
        }
    }
}
