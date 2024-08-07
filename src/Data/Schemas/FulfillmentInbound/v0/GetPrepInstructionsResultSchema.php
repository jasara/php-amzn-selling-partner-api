<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetPrepInstructionsResultSchema extends BaseSchema
{
    public function __construct(
        public ?SkuPrepInstructionsListSchema $sku_prep_instructions_list,
        public ?InvalidSkuListSchema $invalid_sku_list,
        public ?AsinPrepInstructionsListSchema $asin_prep_instructions_list,
        public ?InvalidAsinListSchema $invalid_asin_list,
    ) {
    }
}
