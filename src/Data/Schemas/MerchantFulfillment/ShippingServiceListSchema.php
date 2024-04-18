<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ShippingServiceSchema>
 */
class ShippingServiceListSchema extends TypedCollection
{
    public const ITEM_CLASS = ShippingServiceSchema::class;
}
