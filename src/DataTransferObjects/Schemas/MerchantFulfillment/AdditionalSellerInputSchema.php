<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Spatie\DataTransferObject\DataTransferObject;

class AdditionalSellerInputSchema extends DataTransferObject
{
    public ?string $date_type;

    public ?string $value_as_string;

    public ?bool $value_as_boolean;

    public ?int $value_as_integer;

    public ?string $value_as_timestamp;

    public ?AddressSchema $value_as_address;

    public ?WeightSchema $value_as_weight;
}
