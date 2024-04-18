<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FulfillmentPreviewShipmentSchema>
 */
class FulfillmentPreviewShipmentListSchema extends TypedCollection
{
    public const ITEM_CLASS = FulfillmentPreviewShipmentSchema::class;
}
