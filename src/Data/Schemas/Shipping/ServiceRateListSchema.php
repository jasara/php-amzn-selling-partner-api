<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ServiceRateSchema>
 */
class ServiceRateListSchema extends TypedCollection
{
    protected string $item_class = ServiceRateSchema::class;
}
