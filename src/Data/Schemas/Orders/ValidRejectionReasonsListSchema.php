<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ValidRejectionReasonsSchema>
 */
class ValidRejectionReasonsListSchema extends TypedCollection
{
    public const ITEM_CLASS = ValidRejectionReasonsSchema::class;
}
