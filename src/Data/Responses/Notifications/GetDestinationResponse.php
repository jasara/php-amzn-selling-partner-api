<?php

namespace Jasara\AmznSPA\Data\Responses\Notifications;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Notifications\DestinationSchema;

class GetDestinationResponse extends BaseResponse
{
    public ?DestinationSchema $payload;
}
