<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemSchema>
 */
class ItemListSchema extends TypedCollection
{
    protected string $item_class = ItemSchema::class;
}
