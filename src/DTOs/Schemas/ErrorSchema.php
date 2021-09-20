<?php

namespace Jasara\AmznSPA\DTOs\Schemas;

use Spatie\DataTransferObject\DataTransferObject;

class ErrorSchema extends DataTransferObject
{
    public string $code;

    public string $message;

    public string $details;
}
