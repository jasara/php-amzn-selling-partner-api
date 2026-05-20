<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<TransactionSchema>
 */
class TransactionsSchema extends TypedCollection
{
    public const ITEM_CLASS = TransactionSchema::class;
}
