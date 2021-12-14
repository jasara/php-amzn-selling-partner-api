<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class ItemProcurementSchema extends DataTransferObject
{
    public MoneySchema $cost_price;
}
