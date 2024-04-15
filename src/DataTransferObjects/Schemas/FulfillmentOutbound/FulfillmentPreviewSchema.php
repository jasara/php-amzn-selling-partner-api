<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class FulfillmentPreviewSchema extends DataTransferObject
{
    #[StringEnumValidator(['Standard', 'Expedited', 'Priority', 'ScheduledDelivery'])]
    public string $shipping_speed_category;

    public ?ScheduledDeliveryInfoSchema $scheduled_delivery_info;

    public bool $is_fulfillable;

    public bool $is_cod_capable;

    public ?WeightSchema $estimated_shipping_weight;

    #[CastWith(ArrayCaster::class, itemType: FeeSchema::class)]
    public ?FeeListSchema $estimated_fees;

    #[CastWith(ArrayCaster::class, itemType: FulfillmentPreviewShipmentSchema::class)]
    public ?FulfillmentPreviewShipmentListSchema $fulfillment_preview_shipments;

    #[CastWith(ArrayCaster::class, itemType: FulfillmentPreviewItemSchema::class)]
    public ?UnfulfillablePreviewItemListSchema $unfulfillable_preview_items;

    public ?array $order_unfulfillable_reasons;

    public string $marketplace_id;

    #[CastWith(ArrayCaster::class, itemType: FeatureSettingShema::class)]
    public ?FeatureSettingListSchema $feature_constraints;
}
