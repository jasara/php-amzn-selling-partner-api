<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<IncludedFeeDetailSchema>
 */
class IncludedFeeDetailListSchema extends TypedCollection
{
    public const ITEM_CLASS = IncludedFeeDetailSchema::class;
}
