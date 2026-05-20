<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SubmitInvoiceRequestSchema extends BaseSchema
{
    public function __construct(
        public ?string $invoice_content = null,
        public ?string $marketplace_id = null,
        public ?string $content_md5_value = null,
    ) {}
}
