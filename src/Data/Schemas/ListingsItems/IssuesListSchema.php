<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<IssueSchema>
 */
class IssuesListSchema extends TypedCollection
{
    public const ITEM_CLASS = IssueSchema::class;
}
