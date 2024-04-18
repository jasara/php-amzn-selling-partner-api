<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FulfillmentAvailabilitySchema extends BaseSchema
{
    public function __construct(
        public string $fulfillment_channel_code,
        public ?int $quantity,
    ) {
    }
}
