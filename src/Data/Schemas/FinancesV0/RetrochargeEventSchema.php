<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RetrochargeEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $retrocharge_event_type = null,
        public ?string $amazon_order_id = null,
        public ?string $posted_date = null,
        public ?CurrencySchema $base_tax = null,
        public ?CurrencySchema $shipping_tax = null,
        public ?string $marketplace_name = null,
        public ?TaxWithheldComponentListSchema $retrocharge_tax_withheld_list = null,
    ) {}
}
