<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FulfillmentOrderSchema>
 */
class FulfillmentOrderListSchema extends TypedCollection
{
    protected string $item_class = FulfillmentOrderSchema::class;
}
