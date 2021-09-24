<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\ConfirmPreorderResultSchema;

class ConfirmPreorderResponse extends BaseResponse
{
    public ?ConfirmPreorderResultSchema $payload;
}
