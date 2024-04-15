<?php

namespace Jasara\AmznSPA\Data\Responses\Notifications;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Notifications\SubscriptionSchema;

class GetSubscriptionByIdResponse extends BaseResponse
{
    public ?SubscriptionSchema $payload;
}
