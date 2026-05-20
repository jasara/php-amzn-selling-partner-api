<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class BuyerSchema extends BaseSchema
{
    public function __construct(
        public ?string $buyer_id = null,
        public ?string $name = null,
        public ?string $phone = null,
        public ?bool $is_prime_member = null,
    ) {}
}
