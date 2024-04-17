<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<EventSchema>
 */
class EventListSchema extends TypedCollection
{
    protected string $item_class = EventSchema::class;
}
