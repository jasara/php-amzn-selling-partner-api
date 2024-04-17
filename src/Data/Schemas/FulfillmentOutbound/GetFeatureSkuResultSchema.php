<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetFeatureSkuResultSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public string $feature_name,
        public bool $is_eligible,
        public ?array $ineligible_reasons,
        public FeatureSkuSchema $sku_info,
    ) {
    }
}
