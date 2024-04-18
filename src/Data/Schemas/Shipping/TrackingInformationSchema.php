<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TrackingInformationSchema extends BaseSchema
{
    public function __construct(
        #[MaxLengthValidator(60)]
        public string $tracking_id,
        public TrackingSummarySchema $summary,
        #[CarbonFromStringCaster]
        public CarbonImmutable $promised_delivery_date,
        public EventListSchema $event_history,
    ) {
    }
}
