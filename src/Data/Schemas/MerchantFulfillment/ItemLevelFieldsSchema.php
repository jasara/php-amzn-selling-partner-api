<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemLevelFieldsSchema extends BaseSchema
{
    public function __construct(
        public string $asin,

        public AdditionalInputsListSchema $additional_inputs,
    ) {
    }
}
