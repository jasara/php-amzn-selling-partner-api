<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class AdditionalSellerInputSchema extends DataTransferObject
{
    public ?string $date_type;

    public ?string $value_as_string;

    public ?bool $value_as_boolean;

    public ?int $value_as_integer;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $value_as_timestamp;

    public ?AddressSchema $value_as_address;

    public ?WeightSchema $value_as_weight;

    public PackageDimensionsSchema $value_as_dimension;

    public MoneySchema $value_as_currency;
}
