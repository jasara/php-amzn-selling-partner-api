<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class BuyerTaxInfoSchema extends BaseSchema
{
    public function __construct(
        public ?string $company_legal_name = null,
        public ?string $taxing_region = null,
        public ?TaxClassificationListSchema $tax_classifications = null,
    ) {}
}
