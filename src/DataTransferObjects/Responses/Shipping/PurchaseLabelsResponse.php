<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\PurchaseLabelsResultSchema;

class PurchaseLabelsResponse extends BaseResponse
{
    public ?PurchaseLabelsResultSchema $payload;
}
