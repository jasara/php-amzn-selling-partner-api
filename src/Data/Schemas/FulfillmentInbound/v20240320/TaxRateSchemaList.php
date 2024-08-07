<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<TaxRateSchema>
 */
class TaxRateSchemaList extends TypedCollection
{
    public const ITEM_CLASS = TaxRateSchema::class;
}
