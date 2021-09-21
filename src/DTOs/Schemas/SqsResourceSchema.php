<?php

namespace Jasara\AmznSPA\DTOs\Schemas;

use Spatie\DataTransferObject\DataTransferObject;

class SqsResourceSchema extends DataTransferObject
{
    public string $arn;
}
