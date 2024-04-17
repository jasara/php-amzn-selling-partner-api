<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InvalidSkuSchema>
 */
class InvalidSkuListSchema extends TypedCollection
{
    protected string $item_class = InvalidSkuSchema::class;
}
