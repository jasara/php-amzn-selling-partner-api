<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\CODSettingsSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\CreateFulfillmentOrderItemListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\DeliveryWindowSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\FeatureSettingListSchema;

class CreateFulfillmentOrderRequest extends BaseRequest
{
    public function __construct(
        public string $seller_fulfillment_order_id,
        public string $displayable_order_id,
        #[CarbonFromStringCaster]
        public CarbonImmutable $displayable_order_date,
        public string $displayable_order_comment,
        #[StringEnumValidator(['Standard', 'Expedited', 'Priority', 'ScheduledDelivery'])]
        public string $shipping_speed_category,
        public AddressSchema $destination_address,
        public CreateFulfillmentOrderItemListSchema $items,
        public ?DeliveryWindowSchema $delivery_window = null,
        #[StringEnumValidator(['Ship', 'Hold'])]
        public ?string $fulfillment_action = null,
        #[StringEnumValidator(['FillOrKill', 'fulfillment_policy', 'FillAllAvailable'])]
        public ?string $fulfillment_policy = null,
        public ?CODSettingsSchema $cod_settings = null,
        public ?string $ship_from_country_code = null,
        public ?array $notification_emails = null,
        public ?FeatureSettingListSchema $feature_constraints = null,
        public ?string $marketplace_id = null,
    ) {
    }
}
