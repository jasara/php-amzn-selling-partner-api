<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FeaturesSchema>
 */
class GetFeaturesListSchema extends TypedCollection
{
    protected string $item_class = FeaturesSchema::class;
}
