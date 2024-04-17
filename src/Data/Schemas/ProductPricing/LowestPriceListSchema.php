<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<LowestPriceTypeSchema>
 */
class LowestPriceListSchema extends TypedCollection
{
    protected string $item_class = LowestPriceTypeSchema::class;
}
