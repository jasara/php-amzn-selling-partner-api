<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AdditionalInputsSchema>
 */
class AdditionalInputsListSchema extends TypedCollection
{
    protected string $item_class = AdditionalInputsSchema::class;
}
