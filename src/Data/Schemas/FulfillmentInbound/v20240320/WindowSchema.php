<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class WindowSchema extends BaseSchema
{
    public function __construct(
        public CarbonImmutable $start,
        public CarbonImmutable $end,
        public ?CarbonImmutable $editable_until,
    ) {
    }
}
