<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<SkuPrepInstructionsSchema>
 */
class SkuPrepInstructionsListSchema extends TypedCollection
{
    protected string $item_class = SkuPrepInstructionsSchema::class;
}
