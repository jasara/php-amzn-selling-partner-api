<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class PriceTypeSchema extends DataTransferObject
{

    public ?MoneyTypeSchema $landed_price;

    public ?MoneyTypeSchema $listing_price;

    public ?MoneyTypeSchema $shipping;

    public ?PointsSchema $points;
}
