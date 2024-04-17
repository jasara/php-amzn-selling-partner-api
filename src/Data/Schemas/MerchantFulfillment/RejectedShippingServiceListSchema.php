<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<RejectedShippingServiceSchema>
 */
class RejectedShippingServiceListSchema extends TypedCollection
{
    public const string ITEM_CLASS = RejectedShippingServiceSchema::class;
}
