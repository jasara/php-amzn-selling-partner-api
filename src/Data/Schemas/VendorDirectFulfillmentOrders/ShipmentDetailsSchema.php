<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?bool $is_priority_shipment = null,
        public ?bool $is_scheduled_delivery_shipment = null,
        public ?bool $is_pslip_required = null,
        public ?bool $is_gift = null,
        public ?string $ship_method = null,
        public ?ShipmentDatesSchema $shipment_dates = null,
        public ?string $message_to_customer = null,
    ) {}
}
