<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FeaturedBuyingOption>
 */
class FeaturedBuyingOptionList extends TypedCollection
{
    public const ITEM_CLASS = FeaturedBuyingOption::class;
}