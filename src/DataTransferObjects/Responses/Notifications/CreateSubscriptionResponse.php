<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Notifications;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\SubscriptionSchema;

class CreateSubscriptionResponse extends BaseResponse
{
    public ?SubscriptionSchema $payload;
}
