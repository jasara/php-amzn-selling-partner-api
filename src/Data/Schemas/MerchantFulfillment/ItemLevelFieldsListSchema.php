<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemLevelFieldsSchema>
 */
class ItemLevelFieldsListSchema extends TypedCollection
{
    protected string $item_class = ItemLevelFieldsSchema::class;
}
