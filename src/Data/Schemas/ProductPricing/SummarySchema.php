<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class SummarySchema extends BaseSchema
{
    public function __construct(
        public int $total_offer_count,

        public ?NumberOfOffersListSchema $number_of_offers,

        public ?LowestPriceListSchema $lowest_prices,
        public ?string $buy_box_prices,
        public ?MoneySchema $list_price,
        public ?MoneySchema $competitive_price_threshold,
        public ?MoneySchema $suggested_lower_price_plus_shipping,
        public ?SalesRankListSchema $sales_rankings,

        public ?BuyBoxEligibleOfferListSchema $buy_box_eligible_offers,
        public ?CarbonImmutable $offers_available_time,
    ) {
    }
}
