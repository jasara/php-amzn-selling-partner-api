<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<TermsAndConditionsNotAcceptedCarrierSchema>
 */
class TermsAndConditionsNotAcceptedCarrierListSchema extends TypedCollection
{
    public const ITEM_CLASS = TermsAndConditionsNotAcceptedCarrierSchema::class;
}
