<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $shipped_date = null,
        public ?string $shipment_status = null,
        public ?bool $is_priority_shipment = null,
        public ?string $vendor_order_number = null,
        public ?string $estimated_delivery_date = null,
    ) {}
}
