<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ReturnAuthorizationSchema>
 */
class ReturnAuthorizationListSchema extends TypedCollection
{
    public const ITEM_CLASS = ReturnAuthorizationSchema::class;
}
