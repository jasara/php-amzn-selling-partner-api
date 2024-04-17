<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InboundShipmentPlanItemSchema>
 */
class InboundShipmentPlanItemListSchema extends TypedCollection
{
    protected string $item_class = InboundShipmentPlanItemSchema::class;
}
