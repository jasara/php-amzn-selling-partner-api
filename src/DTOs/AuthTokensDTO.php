<?php

namespace Jasara\AmznSPA\DTOs;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DTOs\Casts\CarbonFromSecondsCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class AuthTokensDTO extends DataTransferObject
{
    public string $access_token;

    #[CastWith(CarbonFromSecondsCaster::class)]
    public CarbonImmutable $expires_at;

    public string $refresh_token;
}
