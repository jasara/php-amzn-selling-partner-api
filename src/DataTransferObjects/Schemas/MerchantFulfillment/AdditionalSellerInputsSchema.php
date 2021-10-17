<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\DataTransferObject;

class AdditionalSellerInputsSchema extends DataTransferObject
{
    public string $additional_input_field_name;

    public AdditionalSellerInputSchema $additional_seller_input;
}
