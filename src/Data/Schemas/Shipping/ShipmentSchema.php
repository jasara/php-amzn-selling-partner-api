<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;

class ShipmentSchema extends BaseSchema
{
    public function __construct(
        public string $shipment_id,
        public string $client_reference_id,
        public ShippingAddressSchema $ship_from,
        public ShippingAddressSchema $ship_to,
        public ?AcceptedRateSchema $accepted_rate,
        public ?PartySchema $shipper,

        public ContainerListSchema $containers,
    ) {
    }
}
