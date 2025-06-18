<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PostalCode extends BaseSchema
{
    public function __construct(
        public ?string $country_code = null,
        public ?string $value = null,
    ) {
    }
}