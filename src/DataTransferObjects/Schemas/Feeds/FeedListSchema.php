<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Feeds;

use Illuminate\Support\Collection;

class FeedListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): FeedSchema
    {
        return parent::offsetGet($key);
    }
}
