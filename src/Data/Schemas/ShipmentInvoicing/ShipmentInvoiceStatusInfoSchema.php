<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentInvoiceStatusInfoSchema extends BaseSchema
{
    public function __construct(
        public ?string $amazon_shipment_id = null,
        public ?string $invoice_status = null,
    ) {}
}
