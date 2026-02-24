<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class OrderPackageSchema extends BaseSchema
{
    public function __construct(
        public string $package_reference_id,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $created_time,
        public ?PackageStatusSchema $package_status,
        public ?string $carrier,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $ship_time,
        public ?string $shipping_service,
        public ?string $tracking_number,
        public ?MerchantAddressSchema $ship_from_address,
        public ?PackageItemListSchema $package_items,
    ) {
    }
}
