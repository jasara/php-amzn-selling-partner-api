<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class MarketplaceDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $marketplace_id = null,
        public ?string $marketplace_name = null,
    ) {}
}
