<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<SalesRankTypeSchema>
 */
class SalesRankListSchema extends TypedCollection
{
    protected string $item_class = SalesRankTypeSchema::class;
}
