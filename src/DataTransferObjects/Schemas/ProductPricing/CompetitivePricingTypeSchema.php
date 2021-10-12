<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class CompetitivePricingTypeSchema extends DataTransferObject
{
    public CompetitivePriceListSchema $competitive_prices;

    public NumberOfOfferListingsListSchema $number_of_offer_listing;

    public ?MoneyTypeSchema $trade_in_value;
}
