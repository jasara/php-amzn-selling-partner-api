<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PackageItemDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_number = null,
        public ?string $lot_number = null,
        public ?ExpirySchema $expiry = null,
    ) {}
}
