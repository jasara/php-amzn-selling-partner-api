<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class AdditionalSellerInputSchema extends BaseSchema
{
    public function __construct(
        public ?string $data_type,
        public ?string $value_as_string,
        public ?bool $value_as_boolean,
        public ?int $value_as_integer,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $value_as_timestamp,
        public ?AddressSchema $value_as_address,
        public ?WeightSchema $value_as_weight,
        public ?PackageDimensionsSchema $value_as_dimension,
        public ?MoneySchema $value_as_currency,
    ) {
    }
}
