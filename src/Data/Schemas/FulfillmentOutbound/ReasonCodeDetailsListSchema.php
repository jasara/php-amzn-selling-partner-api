<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ReasonCodeDetailsSchema>
 */
class ReasonCodeDetailsListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ReasonCodeDetailsSchema::class;
}
