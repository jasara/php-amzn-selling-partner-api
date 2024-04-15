<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class DetailedShippingTimeTypeSchema extends DataTransferObject
{
    public ?int $minimum_hours;

    public ?int $maximum_hours;

    public ?CarbonImmutable $available_date;

    #[StringEnumValidator(['NOW', 'FUTURE_WITHOUT_DATE', 'FUTURE_WITH_DATE'])]
    public ?string $availability_type;
}
