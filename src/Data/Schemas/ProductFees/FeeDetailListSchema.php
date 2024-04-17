<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FeeDetailSchema>
 */
class FeeDetailListSchema extends TypedCollection
{
    protected string $item_class = FeeDetailSchema::class;
}
