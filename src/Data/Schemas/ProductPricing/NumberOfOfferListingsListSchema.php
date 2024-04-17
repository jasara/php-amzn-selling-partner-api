<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<OfferListingCountTypeSchema>
 */
class NumberOfOfferListingsListSchema extends TypedCollection
{
    protected string $item_class = OfferListingCountTypeSchema::class;
}
