<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class TrackingInformationSchema extends BaseSchema
{
    public function __construct(
        #[MaxLengthValidator(60)]
        public string $tracking_id,
        public TrackingSummarySchema $summary,
        #[CastWith(CarbonFromStringCaster::class)]
        public CarbonImmutable $promised_delivery_date,

        public EventListSchema $event_history,
    ) {
    }
}
