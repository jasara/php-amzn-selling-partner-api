<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AvailabilityRecordSchema>
 */
class AvailabilityRecordsSchema extends TypedCollection
{
    public const ITEM_CLASS = AvailabilityRecordSchema::class;
}
