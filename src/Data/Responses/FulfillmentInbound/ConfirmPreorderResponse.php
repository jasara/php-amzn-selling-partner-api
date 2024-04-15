<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\ConfirmPreorderResultSchema;

class ConfirmPreorderResponse extends BaseResponse
{
    public ?ConfirmPreorderResultSchema $payload;
}
