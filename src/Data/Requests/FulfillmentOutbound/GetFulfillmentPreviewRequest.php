<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\FeatureSettingListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\GetFulfillmentPreviewItemListSchema;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;

class GetFulfillmentPreviewRequest extends BaseRequest
{
    public function __construct(
        public ShippingAddressSchema $address,

        public GetFulfillmentPreviewItemListSchema $items,
        public ?string $marketplace_id = null,
        #[StringArrayEnumValidator(['Standard', 'Expedited', 'Priority', 'ScheduledDelivery'])]
        public ?array $shipping_speed_categories = null,
        public ?bool $include_cod_fulfillment_preview = null,
        public ?bool $include_delivery_windows = null,

        public ?FeatureSettingListSchema $feature_constraints = null,
    ) {
    }
}
