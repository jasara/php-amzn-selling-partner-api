<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<GetFulfillmentPreviewItemSchema>
 */
class GetFulfillmentPreviewItemListSchema extends TypedCollection
{
    public const ITEM_CLASS = GetFulfillmentPreviewItemSchema::class;
}
