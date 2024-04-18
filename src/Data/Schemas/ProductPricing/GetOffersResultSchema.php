<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetOffersResultSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public ?string $asin,
        public ?string $sku,
        #[StringEnumValidator(AmazonEnums::ITEM_CONDITION)]
        public string $item_condition,
        public string $status,
        public OfferItemIdentifierSchema $identifier,
        public SummarySchema $summary,

        public OfferDetailListSchema $offers,
    ) {
    }
}
