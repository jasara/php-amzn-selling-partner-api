<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<OfferCountTypeSchema>
 */
class BuyBoxEligibleOfferListSchema extends TypedCollection
{
    protected string $item_class = OfferCountTypeSchema::class;
}
