<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemVariationsByMarketplaceSchema>
 */
class ItemVariationsByMarketplaceListSchema extends TypedCollection
{
    protected string $item_class = ItemVariationsByMarketplaceSchema::class;
}
