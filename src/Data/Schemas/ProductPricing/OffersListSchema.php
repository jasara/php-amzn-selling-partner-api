<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<OfferSchema>
 */
class OffersListSchema extends TypedCollection
{
    public const string ITEM_CLASS = OfferSchema::class;
}
