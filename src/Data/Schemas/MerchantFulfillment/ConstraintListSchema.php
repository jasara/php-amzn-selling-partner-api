<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ConstraintSchema>
 */
class ConstraintListSchema extends TypedCollection
{
    protected string $item_class = ConstraintSchema::class;
}
