<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<IssueSchema>
 */
class IssuesListSchema extends TypedCollection
{
    protected string $item_class = IssueSchema::class;
}
