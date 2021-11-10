<?php

namespace Jasara\AmznSPA\DataTransferObjects;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromSecondsCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class RestrictedDataTokenDTO extends DataTransferObject
{
    public ?string $access_token;

    #[CastWith(CarbonFromSecondsCaster::class)]
    public ?CarbonImmutable $expires_at;
}
