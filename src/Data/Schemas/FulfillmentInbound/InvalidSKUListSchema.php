<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InvalidSkuSchema>
 */
class InvalidSkuListSchema extends TypedCollection
{
    public const string ITEM_CLASS = InvalidSkuSchema::class;
}
