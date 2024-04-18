<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InboundShipmentPlanSchema>
 */
class InboundShipmentPlanListSchema extends TypedCollection
{
    public const ITEM_CLASS = InboundShipmentPlanSchema::class;
}
