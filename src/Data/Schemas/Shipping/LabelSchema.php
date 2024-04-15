<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Spatie\DataTransferObject\DataTransferObject;

class LabelSchema extends DataTransferObject
{
    public ?string $label_stream;

    public ?LabelSpecificationSchema $label_specification;
}
