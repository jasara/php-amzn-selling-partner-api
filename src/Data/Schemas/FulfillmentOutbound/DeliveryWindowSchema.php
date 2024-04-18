<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class DeliveryWindowSchema extends BaseSchema
{
    public function __construct(
        #[CarbonFromStringCaster]
        public CarbonImmutable $start_date,
        #[CarbonFromStringCaster]
        public CarbonImmutable $end_date,
    ) {
    }
}
