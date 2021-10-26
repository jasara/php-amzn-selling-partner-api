<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\ContainerSpecificationListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\ContainerSpecificationSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\ServiceTypeListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\ServiceTypeSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetRatesRequest extends BaseRequest
{
    public AddressSchema $ship_to;

    public AddressSchema $ship_from;

    #[CastWith(ArrayCaster::class, itemType: ServiceTypeSchema::class)]
    public ServiceTypeListSchema $service_types;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $ship_date;

    #[CastWith(ArrayCaster::class, itemType: ContainerSpecificationSchema::class)]
    public ContainerSpecificationListSchema $container_specifications;
}
