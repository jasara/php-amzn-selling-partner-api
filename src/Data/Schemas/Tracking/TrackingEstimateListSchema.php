<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Tracking;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<TrackingEstimateSchema>
 */
final class TrackingEstimateListSchema extends TypedCollection
{
    public const ITEM_CLASS = TrackingEstimateSchema::class;
}
