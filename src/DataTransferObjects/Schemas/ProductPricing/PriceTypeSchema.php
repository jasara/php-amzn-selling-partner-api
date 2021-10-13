<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class PriceTypeSchema extends DataTransferObject
{
    public ?MoneySchema $landed_price;

    public ?MoneySchema $listing_price;

    public ?MoneySchema $shipping;

    public ?PointsSchema $points;
}
