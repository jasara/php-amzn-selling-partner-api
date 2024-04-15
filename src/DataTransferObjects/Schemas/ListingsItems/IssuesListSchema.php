<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class IssuesListSchema extends Collection
{
    public function offsetGet($key): IssueSchema
    {
        return parent::offsetGet($key);
    }
}
