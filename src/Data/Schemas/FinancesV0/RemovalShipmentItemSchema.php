<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RemovalShipmentItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $removal_shipment_item_id = null,
        public ?string $tax_collection_model = null,
        public ?string $fulfillment_network_sku = null,
        public ?int $quantity = null,
        public ?CurrencySchema $revenue = null,
        public ?CurrencySchema $fee_amount = null,
        public ?CurrencySchema $tax_amount = null,
        public ?CurrencySchema $tax_withheld = null,
    ) {}
}
