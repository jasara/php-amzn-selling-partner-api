<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InboundShipmentPlanRequestItemSchema>
 */
class InboundShipmentPlanRequestItemListSchema extends TypedCollection
{
    protected string $item_class = InboundShipmentPlanRequestItemSchema::class;
}
