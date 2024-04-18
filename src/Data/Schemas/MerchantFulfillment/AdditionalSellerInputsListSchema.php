<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AdditionalSellerInputSchema>
 */
class AdditionalSellerInputsListSchema extends TypedCollection
{
    public const ITEM_CLASS = AdditionalSellerInputSchema::class;
}
