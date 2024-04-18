<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AvailableCarrierWillPickUpOptionSchema>
 */
class AvailableCarrierWillPickUpOptionsListSchema extends TypedCollection
{
    public const ITEM_CLASS = AvailableCarrierWillPickUpOptionSchema::class;
}
