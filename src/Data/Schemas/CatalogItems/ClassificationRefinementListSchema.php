<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ClassificationRefinementSchema>
 */
class ClassificationRefinementListSchema extends TypedCollection
{
    public const ITEM_CLASS = ClassificationRefinementSchema::class;
}
