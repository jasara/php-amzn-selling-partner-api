<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class QuoteSchema extends BaseSchema
{
    public function __construct(
        public CurrencySchema $cost,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $expiration,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $voidable_until,
    ) {
    }
}
