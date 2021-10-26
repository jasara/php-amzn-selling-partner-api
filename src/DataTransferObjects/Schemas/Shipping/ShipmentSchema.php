<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ShipmentSchema extends DataTransferObject
{
    public string $shipment_id;

    public string $client_reference_id;

    public AddressSchema $ship_from;

    public AddressSchema $ship_to;

    public ?AcceptedRateSchema $accepted_rate;

    public ?PartySchema $shipper;

    #[CastWith(ArrayCaster::class, itemType: ContainerSchema::class)]
    public ContainerListSchema $containers;
}
