<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas;

use Spatie\DataTransferObject\DataTransferObject;

class ErrorSchema extends DataTransferObject
{
    public string $code;

    public string $message;

    public ?string $details;
}
