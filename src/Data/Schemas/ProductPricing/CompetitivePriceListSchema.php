<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<CompetitivePriceTypeSchema>
 */
class CompetitivePriceListSchema extends TypedCollection
{
    public const ITEM_CLASS = CompetitivePriceTypeSchema::class;
}
