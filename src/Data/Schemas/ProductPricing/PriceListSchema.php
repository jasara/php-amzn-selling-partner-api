<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PriceSchema>
 */
class PriceListSchema extends TypedCollection
{
    protected string $item_class = PriceSchema::class;
}
