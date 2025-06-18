<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ListingsItemSchema>
 */
class ListingsItemSchemaList extends TypedCollection
{
    public const ITEM_CLASS = ListingsItemSchema::class;
}