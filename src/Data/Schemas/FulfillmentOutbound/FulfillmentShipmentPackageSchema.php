<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class FulfillmentShipmentPackageSchema extends BaseSchema
{
    public function __construct(
        public int $package_number,
        public string $carrier_code,
        public ?string $tracking_number,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $estimated_arrival_date,
    ) {
    }
}
