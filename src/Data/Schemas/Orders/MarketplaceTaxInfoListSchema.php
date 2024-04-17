<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<TaxClassificationSchema>
 */
class MarketplaceTaxInfoListSchema extends TypedCollection
{
    public const string ITEM_CLASS = TaxClassificationSchema::class;
}
