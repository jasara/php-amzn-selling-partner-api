<?php

namespace Jasara\AmznSPA\Data\Base\Validators;

interface Validator
{
    /**
     * @throws DataValidationException
     */
    public function validate(mixed $value): void;
}
