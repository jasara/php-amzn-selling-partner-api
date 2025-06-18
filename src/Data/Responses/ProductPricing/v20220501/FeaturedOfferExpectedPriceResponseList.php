<?php

namespace Jasara\AmznSPA\Data\Responses\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FeaturedOfferExpectedPriceResponse>
 */
class FeaturedOfferExpectedPriceResponseList extends TypedCollection
{
    public const ITEM_CLASS = FeaturedOfferExpectedPriceResponse::class;
}