<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AsinPrepInstructionsSchema>
 */
class AsinPrepInstructionsListSchema extends TypedCollection
{
    protected string $item_class = AsinPrepInstructionsSchema::class;
}
