<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ServiceRateSchema>
 */
class ServiceRateListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ServiceRateSchema::class;
}
