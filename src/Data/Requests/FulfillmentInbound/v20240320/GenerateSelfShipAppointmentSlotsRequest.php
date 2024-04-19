<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Requests\BaseRequest;

class GenerateSelfShipAppointmentSlotsRequest extends BaseRequest
{
    public function __construct(
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $desired_start_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $desired_end_date,
    ) {
    }
}
