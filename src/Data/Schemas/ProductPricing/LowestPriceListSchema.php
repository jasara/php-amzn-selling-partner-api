<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<LowestPriceTypeSchema>
 */
class LowestPriceListSchema extends TypedCollection
{
    public const string ITEM_CLASS = LowestPriceTypeSchema::class;
}
