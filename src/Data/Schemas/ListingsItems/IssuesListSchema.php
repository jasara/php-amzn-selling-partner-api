<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class IssuesListSchema extends Collection
{
    public function offsetGet($key): IssueSchema
    {
        return parent::offsetGet($key);
    }
}
