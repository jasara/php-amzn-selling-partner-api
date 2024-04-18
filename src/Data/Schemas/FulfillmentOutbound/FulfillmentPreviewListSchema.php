<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FulfillmentPreviewSchema>
 */
class FulfillmentPreviewListSchema extends TypedCollection
{
    public const ITEM_CLASS = FulfillmentPreviewSchema::class;
}
