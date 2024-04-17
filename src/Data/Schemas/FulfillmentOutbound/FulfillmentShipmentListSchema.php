<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FulfillmentShipmentSchema>
 */
class FulfillmentShipmentListSchema extends TypedCollection
{
    protected string $item_class = FulfillmentShipmentSchema::class;
}
