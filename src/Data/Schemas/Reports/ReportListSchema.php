<?php

namespace Jasara\AmznSPA\Data\Schemas\Reports;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ReportSchema>
 */
class ReportListSchema extends TypedCollection
{
    public const ITEM_CLASS = ReportSchema::class;
}
