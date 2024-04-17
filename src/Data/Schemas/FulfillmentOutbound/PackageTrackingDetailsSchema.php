<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class PackageTrackingDetailsSchema extends BaseSchema
{
    public function __construct(
        public int $package_number,
        public ?string $tracking_number,
        public ?string $customer_tracking_link,
        public ?string $carrier_code,
        public ?string $carrier_phone_number,
        public ?string $carrier_url,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $ship_date,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $estimated_arrival_date,
        public ?TrackingAddressSchema $ship_to_address,
        #[StringEnumValidator(AmazonEnums::CURRENT_STATUS)]
        public ?string $current_status,
        public ?string $current_status_description,
        public ?string $signed_for_by,
        #[StringEnumValidator(AmazonEnums::ADDITIONAL_LOCATION_INFO)]
        public ?string $additional_location_info,
    ) {
    }
}
