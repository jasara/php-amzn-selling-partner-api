<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\PointsSchema;
use Spatie\DataTransferObject\DataTransferObject;

class PriceToEstimateFeesSchema extends DataTransferObject
{
    public MoneySchema $listing_price;

    public ?MoneySchema $shipping;

    public ?PointsSchema $points;
}
