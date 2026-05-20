<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransactionSchema extends BaseSchema
{
    public function __construct(
        public ?SellingPartnerMetadataSchema $selling_partner_metadata = null,
        public ?RelatedIdentifiersSchema $related_identifiers = null,
        public ?string $transaction_type = null,
        public ?string $transaction_id = null,
        public ?string $transaction_status = null,
        public ?string $description = null,
        public ?string $posted_date = null,
        public ?CurrencySchema $total_amount = null,
        public ?MarketplaceDetailsSchema $marketplace_details = null,
        public ?ItemsSchema $items = null,
        public ?ContextsSchema $contexts = null,
        public ?array $breakdowns = null,
    ) {}
}
