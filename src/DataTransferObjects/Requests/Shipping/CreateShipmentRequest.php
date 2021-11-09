<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\ContainerListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\ContainerSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ShippingAddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
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
