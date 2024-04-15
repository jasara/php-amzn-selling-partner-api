<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\DataTransferObject;

class AdditionalInputsSchema extends DataTransferObject
{
    public ?string $additional_input_field_name;

    public ?SellerInputDefinitionSchema $seller_input_definition;
}
