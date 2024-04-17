<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemIdentifiersByMarketplaceSchema>
 */
class ItemIdentifiersByMarketplaceListSchema extends TypedCollection
{
    protected string $item_class = ItemIdentifiersByMarketplaceSchema::class;
}
