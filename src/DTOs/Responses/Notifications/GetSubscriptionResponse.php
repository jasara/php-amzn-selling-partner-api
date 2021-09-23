<?php

namespace Jasara\AmznSPA\DTOs\Responses\Notifications;

use Jasara\AmznSPA\DTOs\Responses\BaseResponse;
use Jasara\AmznSPA\DTOs\Schemas\Notifications\SubscriptionSchema;

class GetSubscriptionResponse extends BaseResponse
{
    public ?SubscriptionSchema $payload;
}
