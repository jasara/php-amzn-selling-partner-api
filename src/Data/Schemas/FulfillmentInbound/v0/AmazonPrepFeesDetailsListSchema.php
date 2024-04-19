<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AmazonPrepFeesDetailsSchema>
 */
class AmazonPrepFeesDetailsListSchema extends TypedCollection
{
    public const ITEM_CLASS = AmazonPrepFeesDetailsSchema::class;
}
