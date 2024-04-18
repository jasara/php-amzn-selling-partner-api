<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FeatureSettingShema>
 */
class FeatureSettingListSchema extends TypedCollection
{
    public const ITEM_CLASS = FeatureSettingShema::class;
}
