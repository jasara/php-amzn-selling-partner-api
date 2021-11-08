<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\LabelSpecificationSchema;

class RetrieveShippingLabelRequest extends BaseRequest
{
    public LabelSpecificationSchema $label_specification;
}
