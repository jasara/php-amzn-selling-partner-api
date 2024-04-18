<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class ShippingServiceSchema extends BaseSchema
{
    public function __construct(
        public string $shipping_service_name,
        public string $carrier_name,
        public string $shipping_service_id,
        public string $shipping_service_offer_id,
        #[CarbonFromStringCaster]
        public CarbonImmutable $ship_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $earliest_estimated_delivery_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $latest_etimated_delivery_date,
        public MoneySchema $rate,
        public ShippingServiceOptionsSchema $shipping_service_options,
        public ?AvailableShippingServiceOptionsSchema $available_shipping_service_options,
        #[StringArrayEnumValidator(AmazonEnums::LABEL_FORMAT)]
        public ?array $available_label_formats,
        public ?AvailableFormatOptionsForLabelListSchema $available_format_options_for_label,
        public bool $requires_additional_seller_inputs,
    ) {
    }
}
