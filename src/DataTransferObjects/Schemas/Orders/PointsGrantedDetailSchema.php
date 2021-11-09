<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class PointsGrantedDetailSchema extends DataTransferObject
{
    public ?int $points_number;

    public ?MoneySchema $points_monetary_value;
}
