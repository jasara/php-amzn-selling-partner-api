<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\LabelSpecificationSchema;

class PurchaseLabelsRequest extends BaseRequest
{
    public string $rate_id;

    public LabelSpecificationSchema $label_specification;
}
