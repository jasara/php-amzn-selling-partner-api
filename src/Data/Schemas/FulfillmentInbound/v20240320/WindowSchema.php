<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class WindowSchema extends BaseSchema
{
    public function __construct(
        #[CarbonFromStringCaster]
        public CarbonImmutable $start,
        #[CarbonFromStringCaster]
        public CarbonImmutable $end,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $editable_until,
    ) {
    }
}
