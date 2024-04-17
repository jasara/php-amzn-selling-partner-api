<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PrimeInformationTypeSchema extends BaseSchema
{
    public function __construct(
        public ?bool $is_prime,
        public bool $is_national_prime,
    ) {
    }
}
