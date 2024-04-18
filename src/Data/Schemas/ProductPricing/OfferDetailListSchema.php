<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<OfferDetailSchema>
 */
class OfferDetailListSchema extends TypedCollection
{
    public const ITEM_CLASS = OfferDetailSchema::class;
}
