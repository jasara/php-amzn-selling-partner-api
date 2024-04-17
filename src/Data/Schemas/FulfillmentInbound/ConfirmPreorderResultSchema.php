<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class ConfirmPreorderResultSchema extends BaseSchema
{
    public function __construct(
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $confirmed_need_by_date,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $confirmed_fulfillable_date,
    ) {
    }
}
