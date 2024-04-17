<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InboundShipmentInfoSchema>
 */
class InboundShipmentListSchema extends TypedCollection
{
    protected string $item_class = InboundShipmentInfoSchema::class;
}
