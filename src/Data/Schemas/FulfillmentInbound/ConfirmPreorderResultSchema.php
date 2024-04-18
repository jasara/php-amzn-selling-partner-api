<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ConfirmPreorderResultSchema extends BaseSchema
{
    public function __construct(
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $confirmed_need_by_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $confirmed_fulfillable_date,
    ) {
    }
}
