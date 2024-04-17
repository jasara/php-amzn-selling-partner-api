<?php

namespace Jasara\AmznSPA\Data\Responses\Notifications;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Notifications\DestinationListSchema;

class GetDestinationsResponse extends BaseResponse
{
    public function __construct(
        public ?DestinationListSchema $payload,
    ) {
    }
}
