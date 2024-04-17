<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<CreateFulfillmentOrderItemSchema>
 */
class CreateFulfillmentOrderItemListSchema extends TypedCollection
{
    protected string $item_class = CreateFulfillmentOrderItemSchema::class;
}
