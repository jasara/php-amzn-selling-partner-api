<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AsinPrepInstructionsSchema>
 */
class AsinPrepInstructionsListSchema extends TypedCollection
{
    public const string ITEM_CLASS = AsinPrepInstructionsSchema::class;
}
