<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class FulfillmentOrderSchema extends DataTransferObject
{
    public string $seller_fulfillment_order_id;

    public ?string $marketplace_id;

    public string $displayable_order_id;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $displayable_order_date;

    public string $displayable_order_comment;

    #[StringEnumValidator(['Standard', 'Expedited', 'Priority', 'ScheduledDelivery'])]
    public string $shipping_speed_category;

    public ?DeliveryWindowSchema $delivery_window;

    public ShippingAddressSchema $destination_address;

    #[StringEnumValidator(['Ship', 'Hold'])]
    public ?string $fulfillment_action;

    #[StringEnumValidator(['FillOrKill', 'FillAll', 'FillAllAvailable'])]
    public ?string $fulfillment_policy;

    public ?CODSettingsSchema $cod_settings;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $received_date;

    #[StringEnumValidator(AmazonEnums::FULFILLMENT_ORDER_STATUS)]
    public string $fulfillment_order_status;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $status_updated_date;

    public ?array $notification_emails;

    #[CastWith(ArrayCaster::class, itemType: FeatureSettingShema::class)]
    public ?FeatureSettingListSchema $feature_constraints;
}
