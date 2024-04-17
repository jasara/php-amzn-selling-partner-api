<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<OfferCountTypeSchema>
 */
class BuyBoxEligibleOfferListSchema extends TypedCollection
{
    public const string ITEM_CLASS = OfferCountTypeSchema::class;
}
