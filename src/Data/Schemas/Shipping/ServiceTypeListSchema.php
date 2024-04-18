<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ServiceTypeSchema>
 */
class ServiceTypeListSchema extends TypedCollection
{
    public const ITEM_CLASS = ServiceTypeSchema::class;
}
