<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PaymentInformationSchema extends BaseSchema
{
    public function __construct(
        public ?string $payment_method = null,
        public ?string $acquirer_id = null,
        public ?string $card_brand = null,
        public ?MoneySchema $payment_value = null,
        public ?string $authorization_code = null,
    ) {}
}
