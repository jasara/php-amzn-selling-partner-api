<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\ContainerListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\ContainerSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\LabelSpecificationSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ShippingAddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
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

    public LabelSpecificationSchema $Label_specification;
}
