<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Transfers;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PaymentMethodDetailsSchema>
 */
class PaymentMethodListSchema extends TypedCollection
{
    public const ITEM_CLASS = PaymentMethodDetailsSchema::class;
}
