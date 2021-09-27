<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\AuthorizationCodeSchema;

class GetAuthorizationCodeResponse extends BaseResponse
{
    public ?AuthorizationCodeSchema $payload;
}
