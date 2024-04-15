<?php

namespace Jasara\AmznSPA\Data\Requests\Shipping;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Shipping\LabelSpecificationSchema;

class PurchaseLabelsRequest extends BaseRequest
{
    public string $rate_id;

    public LabelSpecificationSchema $label_specification;
}
