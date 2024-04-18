<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<EventSchema>
 */
class EventListSchema extends TypedCollection
{
    public const ITEM_CLASS = EventSchema::class;
}
