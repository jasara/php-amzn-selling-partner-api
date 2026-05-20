<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Transfers;

use Jasara\AmznSPA\Data\Responses\BaseResponse;

class InitiatePayoutResponse extends BaseResponse
{
    public function __construct(
        public ?string $payout_reference_id = null,
    ) {}

}
