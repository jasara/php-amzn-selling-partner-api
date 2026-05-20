<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Transfers;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InitiatePayoutResponseSchema extends BaseSchema
{
    public function __construct(
        public ?string $payout_reference_id = null,
    ) {}
}
