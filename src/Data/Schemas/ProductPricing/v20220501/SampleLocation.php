<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SampleLocation extends BaseSchema
{
    public function __construct(
        public ?PostalCode $postal_code = null,
    ) {
    }
}