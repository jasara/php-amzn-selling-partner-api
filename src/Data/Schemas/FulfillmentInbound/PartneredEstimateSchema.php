<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PartneredEstimateSchema extends BaseSchema
{
    public function __construct(
        public AmountSchema $amount,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $confirm_deadline,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $void_deadline,
    ) {
    }
}
