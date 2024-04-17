<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InvalidAsinSchema>
 */
class InvalidAsinListSchema extends TypedCollection
{
    protected string $item_class = InvalidAsinSchema::class;
}
