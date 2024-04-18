<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetAdditionalSellerInputsResultSchema extends BaseSchema
{
    public function __construct(
        public ?AdditionalInputsListSchema $shipment_level_fields,

        public ?ItemLevelFieldsListSchema $item_level_fields_list,
    ) {
    }
}
