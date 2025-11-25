<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SelectedDeliveryWindowSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['in:AVAILABLE,CONGESTED'])]
        public string $availability_type,
        #[RuleValidator(['min:36', 'max:38'])]
        public string $delivery_window_option_id,
        #[CarbonFromStringCaster]
        public CarbonImmutable $start_date,
        #[CarbonFromStringCaster]
        public CarbonImmutable $end_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $editable_until,
    ) {
    }
}
