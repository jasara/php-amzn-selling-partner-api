<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShippingLabelSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_number = null,
        public ?PartyIdentificationSchema $selling_party = null,
        public ?PartyIdentificationSchema $ship_from_party = null,
        public ?string $label_format = null,
        public ?array $label_data = null,
    ) {}
}
