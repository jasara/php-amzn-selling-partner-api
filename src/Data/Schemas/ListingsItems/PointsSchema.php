<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PointsSchema extends BaseSchema
{
    public function __construct(
        public int $points_number,
    ) {
    }
}
