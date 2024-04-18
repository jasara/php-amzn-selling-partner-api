<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<LabelResultSchema>
 */
class LabelResultListSchema extends TypedCollection
{
    public const ITEM_CLASS = LabelResultSchema::class;
}
