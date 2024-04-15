<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Spatie\DataTransferObject\DataTransferObject;

class ContainerItemSchema extends DataTransferObject
{
    public int $quantity;

    public CurrencySchema $unit_price;

    public WeightSchema $unit_weight;

    public string $title;
}
