<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ProductContextSchema extends BaseSchema
{
    public function __construct(
        public ?string $asin = null,
        public ?string $sku = null,
        public ?int $quantity_shipped = null,
        public ?string $fulfillment_network = null,
    ) {}
}
