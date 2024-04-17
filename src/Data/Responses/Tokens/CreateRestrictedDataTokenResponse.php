<?php

namespace Jasara\AmznSPA\Data\Responses\Tokens;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Responses\BaseResponse;

class CreateRestrictedDataTokenResponse extends BaseResponse
{
    public ?CarbonImmutable $expires_in;

    public function __construct(
        public ?string $restricted_data_token,
        CarbonImmutable|int|null $expires_in,
    ) {
        $this->expires_in = match (true) {
            is_int($expires_in) => CarbonImmutable::now()->addSeconds($expires_in),
            $expires_in instanceof CarbonImmutable => $expires_in,
            default => null,
        };
    }
}
