<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class PackageTrackingDetailsSchema extends DataTransferObject
{
    public int $package_number;

    public ?string $tracking_number;

    public ?string $customer_tracking_link;

    public ?string $carrier_code;

    public ?string $carrier_phone_number;

    public ?string $carrier_url;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $ship_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $estimated_arrival_date;

    public ?TrackingAddressSchema $ship_to_address;

    #[StringEnumValidator(AmazonEnums::CURRENTSTATUS)]
    public ?string $current_status;

    public ?string $current_status_description;

    public ?string $signed_for_by;

    #[StringEnumValidator(AmazonEnums::ADDITIONALLOCATIONINFO)]
    public ?string $additional_location_info;
}
