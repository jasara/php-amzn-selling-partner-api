<?php

namespace Jasara\AmznSPA\Data\Schemas\Reports;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ReportScheduleSchema>
 */
class ReportScheduleListSchema extends TypedCollection
{
    protected string $item_class = ReportScheduleSchema::class;
}
