<?php

namespace Jasara\AmznSPA\DTOs\Schemas\Notifications;

use Spatie\DataTransferObject\DataTransferObject;

class SqsResourceSchema extends DataTransferObject
{
    public string $arn;
}
