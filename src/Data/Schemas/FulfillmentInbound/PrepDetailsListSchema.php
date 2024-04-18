<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PrepDetailsSchema>
 */
class PrepDetailsListSchema extends TypedCollection
{
    public const ITEM_CLASS = PrepDetailsSchema::class;
}
