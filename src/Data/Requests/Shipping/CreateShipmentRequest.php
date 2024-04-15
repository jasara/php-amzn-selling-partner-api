<?php

namespace Jasara\AmznSPA\Data\Requests\Shipping;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Shipping\ContainerListSchema;
use Jasara\AmznSPA\Data\Schemas\Shipping\ContainerSchema;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;
use Jasara\AmznSPA\Data\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CreateShipmentRequest extends BaseRequest
{
    #[MaxLengthValidator(40)]
    public string $client_reference_id;

    public ShippingAddressSchema $ship_to;

    public ShippingAddressSchema $ship_from;

    #[CastWith(ArrayCaster::class, itemType: ContainerSchema::class)]
    public ContainerListSchema $containers;
}
