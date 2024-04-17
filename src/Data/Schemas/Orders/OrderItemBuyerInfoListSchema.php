<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<OrderItemBuyerInfoSchema>
 */
class OrderItemBuyerInfoListSchema extends TypedCollection
{
    protected string $item_class = OrderItemBuyerInfoSchema::class;
}
