<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InboundShipmentInfoSchema>
 */
class InboundShipmentListSchema extends TypedCollection
{
    public const ITEM_CLASS = InboundShipmentInfoSchema::class;
}
