<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ValidVerificationDetailsSchema>
 */
class ValidVerificationDetailsListSchema extends TypedCollection
{
    public const ITEM_CLASS = ValidVerificationDetailsSchema::class;
}
