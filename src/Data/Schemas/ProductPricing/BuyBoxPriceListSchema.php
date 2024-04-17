<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<BuyBoxPriceTypeSchema>
 */
class BuyBoxPriceListSchema extends TypedCollection
{
    public const string ITEM_CLASS = BuyBoxPriceTypeSchema::class;
}
