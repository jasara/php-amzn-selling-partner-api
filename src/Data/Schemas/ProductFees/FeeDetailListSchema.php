<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FeeDetailSchema>
 */
class FeeDetailListSchema extends TypedCollection
{
    public const string ITEM_CLASS = FeeDetailSchema::class;
}
