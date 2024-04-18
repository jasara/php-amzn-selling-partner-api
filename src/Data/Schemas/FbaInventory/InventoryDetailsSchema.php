<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InventoryDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?int $fulfillable_quantity,
        public ?int $inbound_working_quantity,
        public ?int $inbound_shipped_quantity,
        public ?int $inbound_receiving_quantity,
        public ?ReservedQuantitySchema $reserved_quantity,
        public ?ResearchingQuantitySchema $researching_quantity,
        public ?UnfulfillableQuantitySchema $unfillable_quantity,
    ) {
    }
}
