<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications;

use Spatie\DataTransferObject\DataTransferObject;

class SqsResourceSchema extends DataTransferObject
{
    public string $arn;
}
