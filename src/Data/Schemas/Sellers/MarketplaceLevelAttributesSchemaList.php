<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<MarketplaceLevelAttributesSchema>
 */
class MarketplaceLevelAttributesSchemaList extends TypedCollection
{
    public const ITEM_CLASS = MarketplaceLevelAttributesSchema::class;
}
