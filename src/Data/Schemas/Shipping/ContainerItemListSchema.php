<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ContainerItemSchema>
 */
class ContainerItemListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ContainerItemSchema::class;
}
