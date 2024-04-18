<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FulfillmentInstructionSchema extends BaseSchema
{
    public function __construct(
        public ?string $fulfillment_supply_source_id,
    ) {
    }
}
