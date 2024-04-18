<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LabelFormatOptionRequestSchema extends BaseSchema
{
    public function __construct(
        public ?bool $include_packing_slip_with_label,
    ) {
    }
}
