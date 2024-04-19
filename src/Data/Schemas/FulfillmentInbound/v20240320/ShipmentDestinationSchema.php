<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentDestinationSchema extends BaseSchema
{
    public function __construct(
        public ?AddressSchema $address,
        public DestinationType $destination_type,
        #[RuleValidator(['min:1', 'max:1024'])]
        public ?string $warehouse_id,
    ) {
    }
}
