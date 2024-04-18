<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<DeliveryWindowSchema>
 */
class DeliveryWindowListSchema extends TypedCollection
{
    public const ITEM_CLASS = DeliveryWindowSchema::class;
}
