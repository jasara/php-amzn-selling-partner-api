<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<RejectedShippingServiceSchema>
 */
class RejectedShippingServiceListSchema extends TypedCollection
{
    protected string $item_class = RejectedShippingServiceSchema::class;
}
