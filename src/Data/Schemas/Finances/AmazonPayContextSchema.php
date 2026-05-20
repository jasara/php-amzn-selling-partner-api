<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AmazonPayContextSchema extends BaseSchema
{
    public function __construct(
        public ?string $store_name = null,
        public ?string $order_type = null,
        public ?string $channel = null,
    ) {}
}
