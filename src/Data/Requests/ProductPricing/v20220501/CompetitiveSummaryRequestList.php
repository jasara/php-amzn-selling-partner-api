<?php

namespace Jasara\AmznSPA\Data\Requests\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<CompetitiveSummaryRequest>
 */
class CompetitiveSummaryRequestList extends TypedCollection
{
    public const ITEM_CLASS = CompetitiveSummaryRequest::class;
}