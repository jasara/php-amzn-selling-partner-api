<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FulfillmentShipmentSchema>
 */
class FulfillmentShipmentListSchema extends TypedCollection
{
    public const string ITEM_CLASS = FulfillmentShipmentSchema::class;
}
