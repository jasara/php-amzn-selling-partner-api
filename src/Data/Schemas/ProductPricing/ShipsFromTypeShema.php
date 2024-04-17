<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipsFromTypeShema extends BaseSchema
{
    public function __construct(
        public ?string $state,
        public ?string $country,
    ) {
    }
}
