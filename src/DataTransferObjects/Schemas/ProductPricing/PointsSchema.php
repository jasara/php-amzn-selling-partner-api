<?php


namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class PointsSchema extends DataTransferObject
{
    public ?int $points_number;

    public ?MoneyTypeSchema $points_monetary_value;
}
