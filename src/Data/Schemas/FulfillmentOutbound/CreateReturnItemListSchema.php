<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<CreateReturnItemSchema>
 */
class CreateReturnItemListSchema extends TypedCollection
{
    public const ITEM_CLASS = CreateReturnItemSchema::class;
}
