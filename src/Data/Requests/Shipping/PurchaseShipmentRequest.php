<?php

namespace Jasara\AmznSPA\Data\Requests\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Shipping\ContainerListSchema;
use Jasara\AmznSPA\Data\Schemas\Shipping\ContainerSchema;
use Jasara\AmznSPA\Data\Schemas\Shipping\LabelSpecificationSchema;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;
use Jasara\AmznSPA\Data\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class PurchaseShipmentRequest extends BaseRequest
{
    #[MaxLengthValidator(40)]
    public string $client_reference_id;

    public ShippingAddressSchema $ship_to;

    public ShippingAddressSchema $ship_from;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $ship_date;

    #[StringEnumValidator(['Amazon Shipping Ground', 'Amazon Shipping Standard', 'Amazon Shipping Premium'])]
    public string $service_type;

    #[CastWith(ArrayCaster::class, itemType: ContainerSchema::class)]
    public ContainerListSchema $containers;

    public LabelSpecificationSchema $label_specification;
}
