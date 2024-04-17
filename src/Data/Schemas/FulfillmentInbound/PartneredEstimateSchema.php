<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class PartneredEstimateSchema extends BaseSchema
{
    public function __construct(
        public AmountSchema $amount,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $confirm_deadline,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $void_deadline,
    ) {
    }
}
