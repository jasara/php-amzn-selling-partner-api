<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $item_sequence_number = null,
        public ?string $amazon_product_identifier = null,
        public ?string $vendor_product_identifier = null,
        public ?ItemQuantitySchema $shipped_quantity = null,
        public ?ItemDetailsSchema $item_details = null,
    ) {}
}
