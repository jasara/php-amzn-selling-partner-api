<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AvailableCarrierWillPickUpOptionSchema>
 */
class AvailableCarrierWillPickUpOptionsListSchema extends TypedCollection
{
    protected string $item_class = AvailableCarrierWillPickUpOptionSchema::class;
}
