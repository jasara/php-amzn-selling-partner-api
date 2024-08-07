<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InboundShipmentPlanRequestItemSchema extends BaseSchema
{
    public function __construct(
        public string $seller_sku,
        public string $asin,
        #[StringEnumValidator(AmazonEnums::CONDITIONS)]
        public string $condition,
        public int $quantity,
        public ?int $quantity_in_case,
        public ?PrepDetailsListSchema $prep_details_list,
    ) {
    }
}
