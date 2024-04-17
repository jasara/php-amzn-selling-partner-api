<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<BuyBoxPriceTypeSchema>
 */
class BuyBoxPriceListSchema extends TypedCollection
{
    protected string $item_class = BuyBoxPriceTypeSchema::class;
}
