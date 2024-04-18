<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ProductInfoDetailSchema extends BaseSchema
{
    public function __construct(
        public ?int $number_of_items,
    ) {
    }
}
