<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AvailableDeliveryExperienceOptionSchema>
 */
class AvailableDeliveryExperienceOptionsListSchema extends TypedCollection
{
    public const string ITEM_CLASS = AvailableDeliveryExperienceOptionSchema::class;
}
