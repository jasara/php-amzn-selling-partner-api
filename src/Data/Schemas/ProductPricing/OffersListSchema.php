<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<OfferSchema>
 */
class OffersListSchema extends TypedCollection
{
    protected string $item_class = OfferSchema::class;
}
