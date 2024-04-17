<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PatchOperationSchema>
 */
class PatchListSchema extends TypedCollection
{
    protected string $item_class = PatchOperationSchema::class;
}
