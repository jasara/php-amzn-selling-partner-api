<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class PointsSchema extends DataTransferObject
{
    public ?int $points_number;

    public ?MoneySchema $points_monetary_value;
}
