<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class FulfillmentShipmentPackageSchema extends DataTransferObject
{
    public int $package_number;

    public string $carrier_code;

    public ?string $tracking_number;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $estimated_arrival_date;
}
