<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class EventSchema extends DataTransferObject
{
    #[MaxLengthValidator(60)]
    public string $event_code;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $event_time;

    public ?LocationSchema $location;
}
