<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class InboundShipmentPlanRequestItemSchema extends DataTransferObject
{
    public string $seller_sku;

    public string $asin;

    #[StringEnumValidator(AmazonEnums::CONDITIONS)]
    public string $condition;

    //public int $
}
