<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FulfillmentPreviewItemSchema>
 */
class UnfulfillablePreviewItemListSchema extends TypedCollection
{
    protected string $item_class = FulfillmentPreviewItemSchema::class;
}
