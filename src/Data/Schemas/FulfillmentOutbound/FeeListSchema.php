<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FeeSchema>
 */
class FeeListSchema extends TypedCollection
{
    protected string $item_class = FeeSchema::class;
}
