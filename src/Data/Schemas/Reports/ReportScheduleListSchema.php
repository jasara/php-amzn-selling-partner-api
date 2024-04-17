<?php

namespace Jasara\AmznSPA\Data\Schemas\Reports;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ReportScheduleSchema>
 */
class ReportScheduleListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ReportScheduleSchema::class;
}
