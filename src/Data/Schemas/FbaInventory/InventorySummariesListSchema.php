<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InventorySummarySchema>
 */
class InventorySummariesListSchema extends TypedCollection
{
    protected string $item_class = InventorySummarySchema::class;
}
