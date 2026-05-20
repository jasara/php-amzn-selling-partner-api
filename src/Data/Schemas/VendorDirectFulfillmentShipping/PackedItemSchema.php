<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PackedItemSchema extends BaseSchema
{
    public function __construct(
        public ?int $item_sequence_number = null,
        public ?string $buyer_product_identifier = null,
        public ?string $vendor_product_identifier = null,
        public ?ItemQuantitySchema $packed_quantity = null,
    ) {}
}
