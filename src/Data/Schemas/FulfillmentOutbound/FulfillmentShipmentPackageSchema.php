<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
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
