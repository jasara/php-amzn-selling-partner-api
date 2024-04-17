<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<RateSchema>
 */
class RateListSchema extends TypedCollection
{
    protected string $item_class = RateSchema::class;
}
