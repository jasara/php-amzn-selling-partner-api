<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<SkuPrepInstructionsSchema>
 */
class SkuPrepInstructionsListSchema extends TypedCollection
{
    public const string ITEM_CLASS = SkuPrepInstructionsSchema::class;
}
