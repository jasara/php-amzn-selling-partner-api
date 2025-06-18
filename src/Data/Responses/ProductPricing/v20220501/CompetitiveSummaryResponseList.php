<?php

namespace Jasara\AmznSPA\Data\Responses\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<CompetitiveSummaryResponse>
 */
class CompetitiveSummaryResponseList extends TypedCollection
{
    public const ITEM_CLASS = CompetitiveSummaryResponse::class;
}