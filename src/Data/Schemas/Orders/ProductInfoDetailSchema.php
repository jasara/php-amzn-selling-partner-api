<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Spatie\DataTransferObject\DataTransferObject;

class ProductInfoDetailSchema extends DataTransferObject
{
    public ?int $number_of_items;
}
