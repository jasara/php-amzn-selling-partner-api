<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class CompetitivePricingTypeSchema extends BaseSchema
{
    public function __construct(
        public CompetitivePriceListSchema $competitive_prices,
        public NumberOfOfferListingsListSchema $number_of_offer_listing,
        public ?MoneySchema $trade_in_value,
    ) {
    }
}
