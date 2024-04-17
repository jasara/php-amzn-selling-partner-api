<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PaymentExecutionDetailItemSchema>
 */
class PaymentExecutionDetailItemListSchema extends TypedCollection
{
    public const string ITEM_CLASS = PaymentExecutionDetailItemSchema::class;
}
