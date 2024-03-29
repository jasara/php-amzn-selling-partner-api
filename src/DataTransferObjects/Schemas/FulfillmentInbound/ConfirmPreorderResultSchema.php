<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class ConfirmPreorderResultSchema extends DataTransferObject
{
    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $confirmed_need_by_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $confirmed_fulfillable_date;
}
