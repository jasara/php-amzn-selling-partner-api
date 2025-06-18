<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PrimeDetails extends BaseSchema
{
    public function __construct(
        public string $eligibility,
    ) {
    }
}