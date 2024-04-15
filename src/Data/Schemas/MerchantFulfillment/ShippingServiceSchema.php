<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Jasara\AmznSPA\Data\Validators\StringArrayEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ShippingServiceSchema extends DataTransferObject
{
    public string $shipping_service_name;

    public string $carrier_name;

    public string $shipping_service_id;

    public string $shipping_service_offer_id;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $ship_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $earliest_estimated_delivery_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $latest_etimated_delivery_date;

    public MoneySchema $rate;

    public ShippingServiceOptionsSchema $shipping_service_options;

    public ?AvailableShippingServiceOptionsSchema $available_shipping_service_options;

    #[StringArrayEnumValidator(AmazonEnums::LABEL_FORMAT)]
    public ?array $available_label_formats;

    #[CastWith(ArrayCaster::class, itemType: LabelFormatOptionSchema::class)]
    public ?AvailableFormatOptionsForLabelListSchema $available_format_options_for_label;

    public bool $requires_additional_seller_inputs;
}
