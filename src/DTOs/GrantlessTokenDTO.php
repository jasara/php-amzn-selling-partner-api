<?php

namespace Jasara\AmznSPA\DTOs;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DTOs\Casts\CarbonFromSecondsCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class GrantlessTokenDTO extends DataTransferObject
{
    public ?string $access_token;

    #[CastWith(CarbonFromSecondsCaster::class)]
    public ?CarbonImmutable $expires_at;
}
