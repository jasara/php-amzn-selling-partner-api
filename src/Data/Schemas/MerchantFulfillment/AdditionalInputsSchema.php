<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AdditionalInputsSchema extends BaseSchema
{
    public function __construct(
        public ?string $additional_input_field_name,
        public ?SellerInputDefinitionSchema $seller_input_definition,
    ) {
    }
}
