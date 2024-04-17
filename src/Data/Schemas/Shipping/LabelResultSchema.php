<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LabelResultSchema extends BaseSchema
{
    public function __construct(
        public ?string $container_reference_id,
        public ?string $tracking_id,
        public ?LabelSchema $label,
    ) {
    }
}
