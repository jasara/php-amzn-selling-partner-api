<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ContainerSpecificationSchema>
 */
class ContainerSpecificationListSchema extends TypedCollection
{
    public const ITEM_CLASS = ContainerSpecificationSchema::class;
}
