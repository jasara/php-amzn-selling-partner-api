<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class GetPreorderInfoResultSchema extends DataTransferObject
{
    public ?bool $shipment_contains_preorderable_items;

    public ?bool $shipment_confirmed_for_preorder;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $need_by_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $confirmed_fulfillable_date;
}
