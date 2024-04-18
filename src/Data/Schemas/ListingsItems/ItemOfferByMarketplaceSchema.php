<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class ItemOfferByMarketplaceSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        #[StringEnumValidator(['B2C', 'B2B'])]
        public string $offer_type,
        public MoneySchema $price,
        public ?PointsSchema $points,
    ) {
    }
}
