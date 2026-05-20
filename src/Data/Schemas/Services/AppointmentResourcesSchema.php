<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AppointmentResourceSchema>
 */
class AppointmentResourcesSchema extends TypedCollection
{
    public const ITEM_CLASS = AppointmentResourceSchema::class;
}
