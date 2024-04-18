<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FulfillmentAvailabilitySchema>
 */
class FulfillmentAvailabilityListSchema extends TypedCollection
{
    public const ITEM_CLASS = FulfillmentAvailabilitySchema::class;
}
