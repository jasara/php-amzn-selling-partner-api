<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ReturnItemSchema>
 */
class ReturnItemListSchema extends TypedCollection
{
    protected string $item_class = ReturnItemSchema::class;
}
