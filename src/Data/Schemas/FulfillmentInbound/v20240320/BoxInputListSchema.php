<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<BoxInputSchema>
 */
class BoxInputListSchema extends TypedCollection
{
    public const ITEM_CLASS = BoxInputSchema::class;
}
