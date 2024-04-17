<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FeatureSkuSchema>
 */
class FeatureSkuListSchema extends TypedCollection
{
    public const string ITEM_CLASS = FeatureSkuSchema::class;
}
