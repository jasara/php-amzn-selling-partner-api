<?php

namespace Jasara\AmznSPA\Data\Requests\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Shipping\ContainerSpecificationListSchema;
use Jasara\AmznSPA\Data\Schemas\Shipping\ContainerSpecificationSchema;
use Jasara\AmznSPA\Data\Schemas\Shipping\ServiceTypeListSchema;
use Jasara\AmznSPA\Data\Schemas\Shipping\ServiceTypeSchema;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetRatesRequest extends BaseRequest
{
    public ShippingAddressSchema $ship_to;

    public ShippingAddressSchema $ship_from;

    #[CastWith(ArrayCaster::class, itemType: ServiceTypeSchema::class)]
    public ServiceTypeListSchema $service_types;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $ship_date;

    #[CastWith(ArrayCaster::class, itemType: ContainerSpecificationSchema::class)]
    public ContainerSpecificationListSchema $container_specifications;
}
