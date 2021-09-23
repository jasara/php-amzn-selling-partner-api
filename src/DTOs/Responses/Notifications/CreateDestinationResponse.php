<?php

namespace Jasara\AmznSPA\DTOs\Responses\Notifications;

use Jasara\AmznSPA\DTOs\Responses\BaseResponse;
use Jasara\AmznSPA\DTOs\Schemas\Notifications\DestinationSchema;

class CreateDestinationResponse extends BaseResponse
{
    public ?DestinationSchema $payload;
}
