<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ReservedQuantitySchema extends BaseSchema
{
    public function __construct(
        public ?int $total_reserved_quantity,
        public ?int $pending_customer_order_quantity,
        public ?int $pending_transshipment_quantity,
        public ?int $fc_processing_quantity,
    ) {
    }
}
