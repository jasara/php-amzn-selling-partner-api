<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<TaxDetailsSchema>
 */
class TaxLineItemSchema extends TypedCollection
{
    public const ITEM_CLASS = TaxDetailsSchema::class;
}
