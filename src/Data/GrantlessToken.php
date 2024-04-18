<?php

namespace Jasara\AmznSPA\Data;

use Carbon\CarbonImmutable;

class GrantlessToken
{
    public ?CarbonImmutable $expires_at;

    public function __construct(
        public ?string $access_token,
        CarbonImmutable|int|null $expires_at,
    ) {
        $this->expires_at = match (true) {
            is_int($expires_at) => CarbonImmutable::now()->addSeconds($expires_at),
            $expires_at instanceof CarbonImmutable => $expires_at,
            default => null,
        };
    }
}
