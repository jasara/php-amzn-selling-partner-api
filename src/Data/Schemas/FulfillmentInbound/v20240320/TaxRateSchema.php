<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxRateSchema extends BaseSchema
{
    public function __construct(
        public float $cess_rate,
        public float $gst_rate,
        public string $tax_type,
    ) {
    }
}
