<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AdditionalInputsSchema>
 */
class AdditionalInputsListSchema extends TypedCollection
{
    public const string ITEM_CLASS = AdditionalInputsSchema::class;
}
