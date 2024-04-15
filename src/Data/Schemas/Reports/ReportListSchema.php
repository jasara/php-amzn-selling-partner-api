<?php

namespace Jasara\AmznSPA\Data\Schemas\Reports;

use Illuminate\Support\Collection;

class ReportListSchema extends Collection
{
    public function offsetGet($key): ReportSchema
    {
        return parent::offsetGet($key);
    }
}
