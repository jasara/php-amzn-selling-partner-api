<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ResearchingQuantityEntrySchema>
 */
class ResearchingQuantityEntryListSchema extends TypedCollection
{
    protected string $item_class = ResearchingQuantityEntrySchema::class;
}
