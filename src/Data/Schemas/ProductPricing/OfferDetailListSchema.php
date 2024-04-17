<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<OfferDetailSchema>
 */
class OfferDetailListSchema extends TypedCollection
{
    protected string $item_class = OfferDetailSchema::class;
}
