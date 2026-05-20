<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Sales;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<OrderMetricsIntervalSchema>
 */
class OrderMetricsListSchema extends TypedCollection
{
    public const ITEM_CLASS = OrderMetricsIntervalSchema::class;
}
