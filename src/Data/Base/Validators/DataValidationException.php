<?php

namespace Jasara\AmznSPA\Data\Base\Validators;

class DataValidationException extends \Exception
{
    public static function create(
        string $class,
        string $property,
        mixed $value,
        ?string $message = null,
    ): self {
        $exception_message = json_encode($value)." is not a valid value for $class::$property.";

        if ($message) {
            $exception_message .= " $message";
        }

        return new self($exception_message);
    }
}
