<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<OrderSchema>
 */
class OrderListSchema extends TypedCollection
{
    public const string ITEM_CLASS = OrderSchema::class;
}
