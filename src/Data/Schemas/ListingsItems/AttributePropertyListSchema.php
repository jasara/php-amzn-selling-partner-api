<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AttributePropertySchema>
 */
class AttributePropertyListSchema extends TypedCollection
{
    public const ITEM_CLASS = AttributePropertySchema::class;
}
