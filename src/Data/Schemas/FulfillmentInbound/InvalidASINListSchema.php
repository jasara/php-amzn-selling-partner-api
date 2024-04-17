<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<InvalidAsinSchema>
 */
class InvalidAsinListSchema extends TypedCollection
{
    public const string ITEM_CLASS = InvalidAsinSchema::class;
}
