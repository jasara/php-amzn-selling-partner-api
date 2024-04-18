<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<SkuPrepInstructionsSchema>
 */
class SkuPrepInstructionsListSchema extends TypedCollection
{
    public const ITEM_CLASS = SkuPrepInstructionsSchema::class;
}
