<?php

namespace Jasara\AmznSPA\Data\Responses\Shipping;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Shipping\PurchaseLabelsResultSchema;

class PurchaseLabelsResponse extends BaseResponse
{
    public ?PurchaseLabelsResultSchema $payload;
}
