<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class PointsGrantedDetailSchema extends BaseSchema
{
    public function __construct(
        public ?int $points_number,
        public ?MoneySchema $points_monetary_value,
    ) {
    }
}
