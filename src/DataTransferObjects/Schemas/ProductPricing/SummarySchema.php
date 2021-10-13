<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Carbon\CarbonImmutable;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class SummarySchema extends DataTransferObject
{
    public int $total_offer_count;

    #[CastWith(ArrayCaster::class, itemType: OfferCountTypeSchema::class)]
    public ?NumberOfOffersSchema $number_of_offers;

    #[CastWith(ArrayCaster::class, itemType: LowestPriceTypeSchema::class)]
    public ?LowestPricesSchema $lowest_prices;

    public ?string $buyBox_prices;

    public ?MoneyTypeSchema $list_price;

    public ?MoneyTypeSchema $competitive_price_threshold;

    public ?MoneyTypeSchema $suggested_lower_price_plus_shipping;

    public ?SalesRankListSchema $sales_rankings;

    #[CastWith(ArrayCaster::class, itemType: OfferCountTypeSchema::class)]
    public ?BuyBoxEligibleOffersSchema $buy_box_eligible_offers;

    public ?CarbonImmutable $offers_availableTime;
}
