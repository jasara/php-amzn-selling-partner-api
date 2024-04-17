<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ContainerItemSchema>
 */
class ContainerItemListSchema extends TypedCollection
{
    protected string $item_class = ContainerItemSchema::class;
}
