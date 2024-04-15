<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\AmountSchema;
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
