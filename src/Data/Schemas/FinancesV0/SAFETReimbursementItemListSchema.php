<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<SAFETReimbursementItemSchema>
 */
class SAFETReimbursementItemListSchema extends TypedCollection
{
    public const ITEM_CLASS = SAFETReimbursementItemSchema::class;
}
