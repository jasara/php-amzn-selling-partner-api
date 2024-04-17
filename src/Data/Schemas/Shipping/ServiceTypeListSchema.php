<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ServiceTypeSchema>
 */
class ServiceTypeListSchema extends TypedCollection
{
    protected string $item_class = ServiceTypeSchema::class;
}
