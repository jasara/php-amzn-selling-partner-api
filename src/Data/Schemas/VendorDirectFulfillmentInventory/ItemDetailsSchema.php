<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentInventory;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $buyer_product_identifier = null,
        public ?string $vendor_product_identifier = null,
        public ?ItemQuantitySchema $available_quantity = null,
        public ?bool $is_obsolete = null,
    ) {}
}
