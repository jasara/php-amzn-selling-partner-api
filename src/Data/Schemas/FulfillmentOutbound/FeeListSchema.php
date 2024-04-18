<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FeeSchema>
 */
class FeeListSchema extends TypedCollection
{
    public const ITEM_CLASS = FeeSchema::class;
}
