<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Spatie\DataTransferObject\DataTransferObject;

class SqsResourceSchema extends DataTransferObject
{
    public string $arn;
}
