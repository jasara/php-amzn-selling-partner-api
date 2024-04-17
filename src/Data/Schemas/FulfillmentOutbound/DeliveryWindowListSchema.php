<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<DeliveryWindowSchema>
 */
class DeliveryWindowListSchema extends TypedCollection
{
    protected string $item_class = DeliveryWindowSchema::class;
}
