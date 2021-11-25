<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class IssuesSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): IssueSchema
    {
        return parent::offsetGet($key);
    }
}
