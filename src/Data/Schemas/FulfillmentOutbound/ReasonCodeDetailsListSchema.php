<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ReasonCodeDetailsSchema>
 */
class ReasonCodeDetailsListSchema extends TypedCollection
{
    public const ITEM_CLASS = ReasonCodeDetailsSchema::class;
}
