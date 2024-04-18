<?php

namespace Jasara\AmznSPA\Data\Requests\Shipping;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Shipping\LabelSpecificationSchema;

class RetrieveShippingLabelRequest extends BaseRequest
{
    public function __construct(
        public LabelSpecificationSchema $label_specification,
    ) {
    }
}
