<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ContainerSchema>
 */
class ContainerListSchema extends TypedCollection
{
    protected string $item_class = ContainerSchema::class;
}
