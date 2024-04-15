<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ShipmentSchema extends DataTransferObject
{
    public string $shipment_id;

    public string $client_reference_id;

    public ShippingAddressSchema $ship_from;

    public ShippingAddressSchema $ship_to;

    public ?AcceptedRateSchema $accepted_rate;

    public ?PartySchema $shipper;

    #[CastWith(ArrayCaster::class, itemType: ContainerSchema::class)]
    public ContainerListSchema $containers;
}
