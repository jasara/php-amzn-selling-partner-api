<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemImagesByMarketplaceSchema>
 */
class ItemImagesByMarketplaceListSchema extends TypedCollection
{
    protected string $item_class = ItemImagesByMarketplaceSchema::class;
}
