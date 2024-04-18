<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FeaturesSchema>
 */
class FeaturesListSchema extends TypedCollection
{
    public const ITEM_CLASS = FeaturesSchema::class;
}
