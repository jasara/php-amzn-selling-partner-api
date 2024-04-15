<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class PriceTypeSchema extends DataTransferObject
{
    public ?MoneySchema $landed_price;

    public ?MoneySchema $listing_price;

    public ?MoneySchema $shipping;

    public ?PointsSchema $points;
}
