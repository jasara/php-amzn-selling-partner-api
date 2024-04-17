<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AmazonPrepFeesDetailsSchema>
 */
class AmazonPrepFeesDetailsListSchema extends TypedCollection
{
    protected string $item_class = AmazonPrepFeesDetailsSchema::class;
}
