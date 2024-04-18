<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FulfillmentShipmentPackageSchema>
 */
class FulfillmentShipmentPackageListSchema extends TypedCollection
{
    public const ITEM_CLASS = FulfillmentShipmentPackageSchema::class;
}
