<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AsinIdentifierSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public string $asin,
    ) {
    }
}
