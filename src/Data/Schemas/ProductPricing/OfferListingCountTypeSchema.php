<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OfferListingCountTypeSchema extends BaseSchema
{
    public function __construct(
        public int $count,
        public string $condition,
    ) {
    }
}
