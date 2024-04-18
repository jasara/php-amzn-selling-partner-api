<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InvalidReturnItemSchema>
 */
class InvalidReturnItemListSchema extends TypedCollection
{
    public const ITEM_CLASS = InvalidReturnItemSchema::class;
}
