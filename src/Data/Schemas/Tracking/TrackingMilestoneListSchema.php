<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Tracking;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<TrackingMilestoneSchema>
 */
final class TrackingMilestoneListSchema extends TypedCollection
{
    public const ITEM_CLASS = TrackingMilestoneSchema::class;
}
