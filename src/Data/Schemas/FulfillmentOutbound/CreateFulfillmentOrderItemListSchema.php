<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<CreateFulfillmentOrderItemSchema>
 */
class CreateFulfillmentOrderItemListSchema extends TypedCollection
{
    public const ITEM_CLASS = CreateFulfillmentOrderItemSchema::class;
}
