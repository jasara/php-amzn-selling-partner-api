<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Finances;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Finances\TransactionsPayloadSchema;

class ListTransactionsResponse extends BaseResponse
{
    public function __construct(
        public ?TransactionsPayloadSchema $payload = null,
    ) {}

}
