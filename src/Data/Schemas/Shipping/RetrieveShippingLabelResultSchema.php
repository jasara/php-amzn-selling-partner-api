<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RetrieveShippingLabelResultSchema extends BaseSchema
{
    public function __construct(
        public string $label_stream,
        public LabelSpecificationSchema $label_specification,
    ) {
    }
}
