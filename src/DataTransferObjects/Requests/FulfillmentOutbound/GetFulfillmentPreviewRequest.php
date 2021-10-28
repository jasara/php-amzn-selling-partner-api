<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\FeatureSettingShema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\FeatureSettingsSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\GetFulfillmentPreviewItemListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\GetFulfillmentPreviewItemSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringArrayEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetFulfillmentPreviewRequest extends BaseRequest
{
    public ?string $marketplace_id;

    public AddressSchema $address; //to be change to the shipping address schema

    #[CastWith(ArrayCaster::class, itemType: GetFulfillmentPreviewItemSchema::class)]
    public GetFulfillmentPreviewItemListSchema $items;

    #[StringArrayEnumValidator(['Standard', 'Expedited', 'Priority', 'ScheduledDelivery'])]
    public ?array $shipping_speed_categories;

    public ?bool $include_cod_fulfillment_preview;

    public ?bool $include_delivery_windows;

    #[CastWith(ArrayCaster::class, itemType: FeatureSettingShema::class)]
    public ?FeatureSettingsSchema $feature_constraints;
}
