<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentSourceSchema extends BaseSchema
{
    public function __construct(
        public ?AddressSchema $address,
        public ShipmentSourceType $source_type,
    ) {
    }
}
