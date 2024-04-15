<?php

namespace Jasara\AmznSPA\Data;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromSecondsCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class RestrictedDataTokenDTO extends DataTransferObject
{
    public ?string $access_token;

    #[CastWith(CarbonFromSecondsCaster::class)]
    public ?CarbonImmutable $expires_at;

    public ?string $path;
}
