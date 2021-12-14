<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductFees;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing\PointsSchema;
use Spatie\DataTransferObject\DataTransferObject;

class PriceToEstimateFeesSchema extends DataTransferObject
{
    public MoneySchema $listing_price;

    public ?MoneySchema $shipping;

    public ?PointsSchema $points;
}
