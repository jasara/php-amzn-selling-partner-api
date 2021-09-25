<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AmountSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class PartneredEstimateSchema extends DataTransferObject
{
    public AmountSchema $amount;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $confirm_deadline;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $void_deadline;
}
