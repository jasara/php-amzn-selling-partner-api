<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class DeliveryWindowSchema extends BaseSchema
{
    public function __construct(
        #[CastWith(CarbonFromStringCaster::class)]
        public CarbonImmutable $start_date,
        #[CastWith(CarbonFromStringCaster::class)]
        public CarbonImmutable $end_date,
    ) {
    }
}
