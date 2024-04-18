<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<SalesRankTypeSchema>
 */
class SalesRankListSchema extends TypedCollection
{
    public const ITEM_CLASS = SalesRankTypeSchema::class;
}
