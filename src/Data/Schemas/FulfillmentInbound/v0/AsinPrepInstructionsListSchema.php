<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AsinPrepInstructionsSchema>
 */
class AsinPrepInstructionsListSchema extends TypedCollection
{
    public const ITEM_CLASS = AsinPrepInstructionsSchema::class;
}
