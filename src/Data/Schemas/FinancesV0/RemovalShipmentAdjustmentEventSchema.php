<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RemovalShipmentAdjustmentEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $posted_date = null,
        public ?string $adjustment_event_id = null,
        public ?string $merchant_order_id = null,
        public ?string $order_id = null,
        public ?string $transaction_type = null,
        public ?array $removal_shipment_item_adjustment_list = null,
    ) {}
}
