<?php

namespace Jasara\AmznSPA\Data\Schemas\Feeds;

use Illuminate\Support\Collection;

class FeedListSchema extends Collection
{
    public function offsetGet($key): FeedSchema
    {
        return parent::offsetGet($key);
    }
}
