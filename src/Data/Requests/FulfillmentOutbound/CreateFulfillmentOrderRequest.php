<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\CODSettingsSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\CreateFulfillmentOrderItemListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\CreateFulfillmentOrderItemSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\DeliveryWindowSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\FeatureSettingListSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CreateFulfillmentOrderRequest extends BaseRequest
{
    public ?string $marketplace_id;

    public string $seller_fulfillmen_order_id;

    public string $displayable_order_id;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $displayable_order_date;

    public string $displayable_order_comment;

    #[StringEnumValidator(['Standard', 'Expedited', 'Priority', 'ScheduledDelivery'])]
    public string $shipping_speed_category;

    public ?DeliveryWindowSchema $delivery_window;

    public AddressSchema $destination_address;

    #[StringEnumValidator(['Ship', 'Hold'])]
    public ?string $fulfillment_action;

    #[StringEnumValidator(['FillOrKill', 'fulfillment_policy', 'FillAllAvailable'])]
    public ?string $fulfillment_policy;

    public ?CODSettingsSchema $cod_settings;

    public ?string $ship_from_country_code;

    public ?array $notification_emails;

    public ?FeatureSettingListSchema $feature_constraints;

    #[CastWith(ArrayCaster::class, itemType: CreateFulfillmentOrderItemSchema::class)]
    public CreateFulfillmentOrderItemListSchema $items;
}
