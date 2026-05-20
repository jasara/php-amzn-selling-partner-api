<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransactionsPayloadSchema extends BaseSchema
{
    public function __construct(
        public ?string $next_token = null,
        public ?TransactionsSchema $transactions = null,
    ) {}
}
