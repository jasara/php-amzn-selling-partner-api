<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Reports;

use Illuminate\Support\Collection;

class ReportListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ReportSchema
    {
        return parent::offsetGet($key);
    }
}
