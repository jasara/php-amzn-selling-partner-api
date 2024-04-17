<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<OrderItemSchema>
 */
class OrderItemListSchema extends TypedCollection
{
    public const string ITEM_CLASS = OrderItemSchema::class;
}
