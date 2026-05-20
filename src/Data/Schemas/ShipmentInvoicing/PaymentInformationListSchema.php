<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PaymentInformationSchema>
 */
class PaymentInformationListSchema extends TypedCollection
{
    public const ITEM_CLASS = PaymentInformationSchema::class;
}
