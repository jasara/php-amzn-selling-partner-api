<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class PointsSchema extends DataTransferObject
{
    public ?int $points_number;

    public ?MoneySchema $points_monetary_value;
}
