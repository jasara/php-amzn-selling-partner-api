<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<RateSchema>
 */
class RateListSchema extends TypedCollection
{
    public const ITEM_CLASS = RateSchema::class;
}
