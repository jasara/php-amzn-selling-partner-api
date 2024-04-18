<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<DestinationSchema>
 */
class DestinationListSchema extends TypedCollection
{
    public const ITEM_CLASS = DestinationSchema::class;
}
