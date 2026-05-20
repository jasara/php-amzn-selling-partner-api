<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderAcknowledgementItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_number = null,
        public ?string $vendor_order_number = null,
        public ?string $acknowledgement_date = null,
        public ?AcknowledgementStatusSchema $acknowledgement_status = null,
        public ?PartyIdentificationSchema $selling_party = null,
        public ?PartyIdentificationSchema $ship_from_party = null,
        public ?array $item_acknowledgements = null,
    ) {}
}
