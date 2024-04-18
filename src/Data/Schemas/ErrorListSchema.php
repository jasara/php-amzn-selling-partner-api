<?php

namespace Jasara\AmznSPA\Data\Schemas;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ErrorSchema>
 */
class ErrorListSchema extends TypedCollection
{
    public const ITEM_CLASS = ErrorSchema::class;
}
