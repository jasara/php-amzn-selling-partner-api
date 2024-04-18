<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetInboundGuidanceResultSchema extends BaseSchema
{
    public function __construct(
        public ?SkuInboundGuidanceListSchema $sku_inbound_guidance_list,

        public ?InvalidSkuListSchema $invalid_sku_list,

        public ?AsinInboundGuidanceListSchema $asin_inbound_guidance_list,

        public ?InvalidAsinListSchema $invalid_asin_list,
    ) {
    }
}
