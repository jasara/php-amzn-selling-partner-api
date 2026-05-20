<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Transfers;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InitiatePayoutRequestSchema extends BaseSchema
{
    public function __construct(
        public ?string $marketplace_id = null,
        public ?string $account_type = null,
    ) {}
}
