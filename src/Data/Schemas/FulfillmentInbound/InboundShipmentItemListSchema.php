<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InboundShipmentItemSchema>
 */
class InboundShipmentItemListSchema extends TypedCollection
{
    public const ITEM_CLASS = InboundShipmentItemSchema::class;
}
