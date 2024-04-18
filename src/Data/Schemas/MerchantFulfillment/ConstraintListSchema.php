<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ConstraintSchema>
 */
class ConstraintListSchema extends TypedCollection
{
    public const ITEM_CLASS = ConstraintSchema::class;
}
