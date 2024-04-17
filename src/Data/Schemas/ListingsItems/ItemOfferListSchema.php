<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemOfferByMarketplaceSchema>
 */
class ItemOfferListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ItemOfferByMarketplaceSchema::class;
}
