<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<Offer>
 */
class OfferList extends TypedCollection
{
    public const ITEM_CLASS = Offer::class;
}