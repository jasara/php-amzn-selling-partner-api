<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<UpdateShipmentStatusOrderItemSchema>
 */
class UpdateShipmentStatusOrderItemListSchema extends TypedCollection
{
    public const ITEM_CLASS = UpdateShipmentStatusOrderItemSchema::class;
}
