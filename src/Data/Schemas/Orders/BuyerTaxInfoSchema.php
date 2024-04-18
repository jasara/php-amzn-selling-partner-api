<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class BuyerTaxInfoSchema extends BaseSchema
{
    public function __construct(
        public ?string $companylegal_name,
        public ?string $taxing_region,

        public ?TaxClassificationListSchema $tax_classifications,
    ) {
    }
}
