<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class OfferItemIdentifierSchema extends DataTransferObject
{
    public string $marketplace_id;

    public ?string $asin;

    public ?string $seller_sku;

    #[StringEnumValidator(AmazonEnums::ITEM_CONDITION)]
    public string $item_condition;
}
