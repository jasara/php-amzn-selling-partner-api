<?php

namespace Jasara\AmznSPA\Data\Responses\Tokens;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromSecondsCaster;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Spatie\DataTransferObject\Attributes\CastWith;

class CreateRestrictedDataTokenResponse extends BaseResponse
{
    public ?string $restricted_data_token;

    #[CastWith(CarbonFromSecondsCaster::class)]
    public ?CarbonImmutable $expires_in;
}
