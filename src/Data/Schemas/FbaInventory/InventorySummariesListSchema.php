<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InventorySummarySchema>
 */
class InventorySummariesListSchema extends TypedCollection
{
    public const string ITEM_CLASS = InventorySummarySchema::class;
}
