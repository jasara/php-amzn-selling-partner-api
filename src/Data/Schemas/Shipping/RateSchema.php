<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class RateSchema extends BaseSchema
{
    public function __construct(
        public ?string $rate_id,
        public ?CurrencySchema $total_charge,
        public ?WeightSchema $billed_weight,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $expiration_time,
        #[StringEnumValidator(['Amazon Shipping Ground', 'Amazon Shipping Standard', 'Amazon Shipping Premium'])]
        public ?string $service_type,
        public ?ShippingPromiseSetSchema $promise,
    ) {
    }
}
