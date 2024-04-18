<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FulfillmentShipmentPackageSchema extends BaseSchema
{
    public function __construct(
        public int $package_number,
        public string $carrier_code,
        public ?string $tracking_number,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $estimated_arrival_date,
    ) {
    }
}
