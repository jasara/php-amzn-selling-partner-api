<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\AuthorizationCodeSchema;

class GetAuthorizationCodeResponse extends BaseResponse
{
    public ?AuthorizationCodeSchema $payload;
}
