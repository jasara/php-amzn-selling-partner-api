<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class GetPreorderInfoResultSchema extends BaseSchema
{
    public function __construct(
        public ?bool $shipment_contains_preorderable_items,
        public ?bool $shipment_confirmed_for_preorder,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $need_by_date,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $confirmed_fulfillable_date,
    ) {
    }
}
