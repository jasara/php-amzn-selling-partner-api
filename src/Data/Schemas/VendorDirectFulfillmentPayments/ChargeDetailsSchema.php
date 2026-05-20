<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentPayments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ChargeDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $type = null,
        public ?MoneySchema $charge_amount = null,
        public ?array $tax_details = null,
    ) {}
}
