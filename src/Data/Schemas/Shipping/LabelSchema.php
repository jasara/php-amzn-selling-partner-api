<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LabelSchema extends BaseSchema
{
    public function __construct(
        public ?string $label_stream,
        public ?LabelSpecificationSchema $label_specification,
    ) {
    }
}
