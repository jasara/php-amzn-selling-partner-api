<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OfferItemIdentifierSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public ?string $asin,
        public ?string $seller_sku,
        #[StringEnumValidator(AmazonEnums::ITEM_CONDITION)]
        public string $item_condition,
    ) {
    }
}
