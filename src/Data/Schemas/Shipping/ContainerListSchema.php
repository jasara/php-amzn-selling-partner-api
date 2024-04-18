<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ContainerSchema>
 */
class ContainerListSchema extends TypedCollection
{
    public const ITEM_CLASS = ContainerSchema::class;
}
