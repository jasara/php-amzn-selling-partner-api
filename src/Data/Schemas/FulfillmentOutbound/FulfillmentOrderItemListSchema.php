<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FulfillmentOrderItemSchema>
 */
class FulfillmentOrderItemListSchema extends TypedCollection
{
    public const string ITEM_CLASS = FulfillmentOrderItemSchema::class;
}
