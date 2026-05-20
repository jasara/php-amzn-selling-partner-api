<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ErrorSchema>
 */
class ErrorListSchema extends TypedCollection
{
    public const ITEM_CLASS = ErrorSchema::class;
}
