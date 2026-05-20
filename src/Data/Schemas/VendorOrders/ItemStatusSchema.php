<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<OrderItemStatusSchema>
 */
class ItemStatusSchema extends TypedCollection
{
    public const ITEM_CLASS = OrderItemStatusSchema::class;
}
