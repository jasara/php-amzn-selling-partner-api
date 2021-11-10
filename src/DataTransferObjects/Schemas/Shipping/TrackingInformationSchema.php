<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class TrackingInformationSchema extends DataTransferObject
{
    #[MaxLengthValidator(60)]
    public string $tracking_id;

    public TrackingSummarySchema $summary;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $promised_delivery_date;

    #[CastWith(ArrayCaster::class, itemType:EventSchema::class)]
    public EventListSchema $event_history;
}
