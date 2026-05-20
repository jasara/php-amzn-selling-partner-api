<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ValueAddedServiceChargeEventSchema>
 */
class ValueAddedServiceChargeEventListSchema extends TypedCollection
{
    public const ITEM_CLASS = ValueAddedServiceChargeEventSchema::class;
}
