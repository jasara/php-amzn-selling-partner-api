<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class FulfillmentPreviewShipmentSchema extends DataTransferObject
{
    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $earliest_ship_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $latest_ship_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $earliest_arrival_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $latest_arrival_date;

    public ?array $shipping_notes;

    #[CastWith(ArrayCaster::class, itemType: GetFulfillmentPreviewItemSchema::class)]
    public GetFulfillmentPreviewItemListSchema $fulfillment_preview_items;
}
