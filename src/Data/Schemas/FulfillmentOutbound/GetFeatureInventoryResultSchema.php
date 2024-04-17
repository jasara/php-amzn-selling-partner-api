<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetFeatureInventoryResultSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public string $feature_name,
        public ?string $next_token,

        public ?FeatureSkuListSchema $feature_skus,
    ) {
    }
}
