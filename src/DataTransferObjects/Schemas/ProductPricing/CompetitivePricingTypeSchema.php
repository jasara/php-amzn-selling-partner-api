<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CompetitivePricingTypeSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: CompetitivePriceTypeSchema::class)]
    public CompetitivePriceListSchema $competitive_prices;

    #[CastWith(ArrayCaster::class, itemType: OfferListingCountTypeSchema::class)]
    public ?NumberOfOfferListingsListSchema $number_of_offer_listings;

    public ?MoneySchema $trade_in_value;
}
