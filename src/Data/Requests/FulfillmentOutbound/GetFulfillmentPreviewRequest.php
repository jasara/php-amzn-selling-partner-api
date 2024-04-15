<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\FeatureSettingListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\FeatureSettingShema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\GetFulfillmentPreviewItemListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\GetFulfillmentPreviewItemSchema;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;
use Jasara\AmznSPA\Data\Validators\StringArrayEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetFulfillmentPreviewRequest extends BaseRequest
{
    public ?string $marketplace_id;

    public ShippingAddressSchema $address;

    #[CastWith(ArrayCaster::class, itemType: GetFulfillmentPreviewItemSchema::class)]
    public GetFulfillmentPreviewItemListSchema $items;

    #[StringArrayEnumValidator(['Standard', 'Expedited', 'Priority', 'ScheduledDelivery'])]
    public ?array $shipping_speed_categories;

    public ?bool $include_cod_fulfillment_preview;

    public ?bool $include_delivery_windows;

    #[CastWith(ArrayCaster::class, itemType: FeatureSettingShema::class)]
    public ?FeatureSettingListSchema $feature_constraints;
}
