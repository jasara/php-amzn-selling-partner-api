<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
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
