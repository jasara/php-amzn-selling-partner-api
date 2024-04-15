<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class ItemProcurementSchema extends DataTransferObject
{
    public MoneySchema $cost_price;
}
