<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Spatie\DataTransferObject\DataTransferObject;

class ProductInfoDetailSchema extends DataTransferObject
{
    public ?int $number_of_items;
}
