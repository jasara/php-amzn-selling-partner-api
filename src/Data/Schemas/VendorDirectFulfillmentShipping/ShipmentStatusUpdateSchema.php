<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentStatusUpdateSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_number = null,
        public ?PartyIdentificationSchema $selling_party = null,
        public ?PartyIdentificationSchema $ship_from_party = null,
        public ?StatusUpdateDetailsSchema $status_update_details = null,
    ) {}
}
