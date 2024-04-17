<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<TaxClassificationSchema>
 */
class TaxClassificationListSchema extends TypedCollection
{
    protected string $item_class = TaxClassificationSchema::class;
}
