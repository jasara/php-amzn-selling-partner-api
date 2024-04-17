<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<TemporarilyUnavailableCarrierSchema>
 */
class TemporarilyUnavailableCarrierListSchema extends TypedCollection
{
    public const string ITEM_CLASS = TemporarilyUnavailableCarrierSchema::class;
}
