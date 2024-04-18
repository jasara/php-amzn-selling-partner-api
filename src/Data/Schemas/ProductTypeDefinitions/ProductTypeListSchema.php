<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ProductTypeSchema>
 */
class ProductTypeListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ProductTypeSchema::class;
}
