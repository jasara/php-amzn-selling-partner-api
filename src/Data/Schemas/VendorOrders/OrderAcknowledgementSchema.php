<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderAcknowledgementSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_number = null,
        public ?PartyIdentificationSchema $selling_party = null,
        public ?string $acknowledgement_date = null,
        public ?array $items = null,
    ) {}
}
