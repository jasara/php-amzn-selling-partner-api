<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;

class FulfillmentPreviewSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(['Standard', 'Expedited', 'Priority', 'ScheduledDelivery'])]
        public string $shipping_speed_category,
        public ?ScheduledDeliveryInfoSchema $scheduled_delivery_info,
        public bool $is_fulfillable,
        public bool $is_cod_capable,
        public ?WeightSchema $estimated_shipping_weight,

        public ?FeeListSchema $estimated_fees,

        public ?FulfillmentPreviewShipmentListSchema $fulfillment_preview_shipments,

        public ?UnfulfillablePreviewItemListSchema $unfulfillable_preview_items,
        public ?array $order_unfulfillable_reasons,
        public string $marketplace_id,

        public ?FeatureSettingListSchema $feature_constraints,
    ) {
    }
}
