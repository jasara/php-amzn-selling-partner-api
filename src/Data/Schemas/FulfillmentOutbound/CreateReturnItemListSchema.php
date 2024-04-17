<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<CreateReturnItemSchema>
 */
class CreateReturnItemListSchema extends TypedCollection
{
    protected string $item_class = CreateReturnItemSchema::class;
}
