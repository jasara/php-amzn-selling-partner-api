<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Tokens;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromSecondsCaster;
use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Spatie\DataTransferObject\Attributes\CastWith;

class CreateRestrictedDataTokenResponse extends BaseResponse
{
    public ?string $restricted_data_token;

    #[CastWith(CarbonFromSecondsCaster::class)]
    public ?CarbonImmutable $expires_in;
}
