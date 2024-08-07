<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\AuthorizationCodeSchema;

class GetAuthorizationCodeResponse extends BaseResponse
{
    public function __construct(
        public ?AuthorizationCodeSchema $payload,
    ) {
    }
}
