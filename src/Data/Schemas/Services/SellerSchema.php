<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SellerSchema extends BaseSchema
{
    public function __construct(
        public ?string $seller_id = null,
    ) {}
}
