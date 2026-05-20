<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_number = null,
        public ?string $lot_number = null,
        public ?string $lot_number_source_reference = null,
        public ?string $lot_number_source_type = null,
        public ?string $country_of_origin = null,
        public ?RegulationReferencesSchema $regulation_references = null,
        public ?ExpirySchema $expiry = null,
        public ?MoneySchema $maximum_retail_price = null,
        public ?string $handling_code = null,
    ) {}
}
