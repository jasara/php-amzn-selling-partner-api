<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Notifications;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\DestinationSchema;

class CreateDestinationResponse extends BaseResponse
{
    public ?DestinationSchema $payload;
}
