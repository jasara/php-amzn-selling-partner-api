<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeaturesSchema extends BaseSchema
{
    public function __construct(
        public string $feature_name,
        public string $feature_description,
        public ?bool $seller_eligible,
    ) {
    }
}
