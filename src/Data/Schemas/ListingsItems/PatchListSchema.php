<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PatchOperationSchema>
 */
class PatchListSchema extends TypedCollection
{
    public const ITEM_CLASS = PatchOperationSchema::class;
}
