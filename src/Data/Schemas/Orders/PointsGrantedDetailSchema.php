<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class PointsGrantedDetailSchema extends DataTransferObject
{
    public ?int $points_number;

    public ?MoneySchema $points_monetary_value;
}
