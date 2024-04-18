<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ReturnItemSchema>
 */
class ReturnItemListSchema extends TypedCollection
{
    public const ITEM_CLASS = ReturnItemSchema::class;
}
