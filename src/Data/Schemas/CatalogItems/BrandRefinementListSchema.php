<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<BrandRefinementSchema>
 */
class BrandRefinementListSchema extends TypedCollection
{
    public const ITEM_CLASS = BrandRefinementSchema::class;
}
