<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Spatie\DataTransferObject\DataTransferObject;

class FulfillmentInstructionSchema extends DataTransferObject
{
    public ?string $fulfillment_supply_source_id;
}
