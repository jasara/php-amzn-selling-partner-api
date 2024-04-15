<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class RateSchema extends DataTransferObject
{
    public ?string $rate_id;

    public ?CurrencySchema $total_charge;

    public ?WeightSchema $billed_weight;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $expiration_time;

    #[StringEnumValidator(['Amazon Shipping Ground', 'Amazon Shipping Standard', 'Amazon Shipping Premium'])]
    public ?string $service_type;

    public ?ShippingPromiseSetSchema $promise;
}
