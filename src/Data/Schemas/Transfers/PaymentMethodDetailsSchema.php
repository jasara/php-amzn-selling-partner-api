<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Transfers;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PaymentMethodDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $account_holder_name = null,
        public ?string $payment_method_id = null,
        public ?string $tail = null,
        public ?ExpiryDateSchema $expiry_date = null,
        public ?string $country_code = null,
        public ?string $payment_method_type = null,
        public ?string $assignment_type = null,
    ) {}
}
