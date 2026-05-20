<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxWithheldComponentSchema extends BaseSchema
{
    public function __construct(
        public ?string $tax_collection_model = null,
        public ?ChargeComponentListSchema $taxes_withheld = null,
    ) {}
}
