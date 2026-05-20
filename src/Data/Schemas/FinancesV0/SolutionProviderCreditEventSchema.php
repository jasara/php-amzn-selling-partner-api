<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SolutionProviderCreditEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $provider_transaction_type = null,
        public ?string $seller_order_id = null,
        public ?string $marketplace_id = null,
        public ?string $marketplace_country_code = null,
        public ?string $seller_id = null,
        public ?string $seller_store_name = null,
        public ?string $provider_id = null,
        public ?string $provider_store_name = null,
        public ?CurrencySchema $transaction_amount = null,
        public ?string $transaction_creation_date = null,
    ) {}
}
