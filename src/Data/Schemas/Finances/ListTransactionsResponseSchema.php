<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ListTransactionsResponseSchema extends BaseSchema
{
    public function __construct(
        public ?TransactionsPayloadSchema $payload = null,
    ) {}
}
