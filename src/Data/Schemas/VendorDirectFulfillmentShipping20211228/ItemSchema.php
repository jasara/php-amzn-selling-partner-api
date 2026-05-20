<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemSchema extends BaseSchema
{
    public function __construct(
        public ?int $item_sequence_number = null,
        public ?string $buyer_product_identifier = null,
        public ?string $vendor_product_identifier = null,
        public ?ItemQuantitySchema $shipped_quantity = null,
    ) {}
}
