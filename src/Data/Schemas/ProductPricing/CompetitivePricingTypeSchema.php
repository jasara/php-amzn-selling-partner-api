<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class CompetitivePricingTypeSchema extends DataTransferObject
{
    public CompetitivePriceListSchema $competitive_prices;

    public NumberOfOfferListingsListSchema $number_of_offer_listing;

    public ?MoneySchema $trade_in_value;
}
