<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class SummarySchema extends DataTransferObject
{
    public int $total_offer_count;

    #[CastWith(ArrayCaster::class, itemType: OfferCountTypeSchema::class)]
    public ?NumberOfOffersListSchema $number_of_offers;

    #[CastWith(ArrayCaster::class, itemType: LowestPriceTypeSchema::class)]
    public ?LowestPriceListSchema $lowest_prices;

    public ?string $buy_box_prices;

    public ?MoneySchema $list_price;

    public ?MoneySchema $competitive_price_threshold;

    public ?MoneySchema $suggested_lower_price_plus_shipping;

    public ?SalesRankListSchema $sales_rankings;

    #[CastWith(ArrayCaster::class, itemType: OfferCountTypeSchema::class)]
    public ?BuyBoxEligibleOfferListSchema $buy_box_eligible_offers;

    public ?CarbonImmutable $offers_available_time;
}
