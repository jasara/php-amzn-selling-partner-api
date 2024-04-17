<?php

namespace Jasara\AmznSPA\Data\Schemas\Feeds;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FeedSchema>
 */
class FeedListSchema extends TypedCollection
{
    protected string $item_class = FeedSchema::class;
}
