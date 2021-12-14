<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductFees;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class FeesEstimateSchema extends DataTransferObject
{
    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $time_of_fees_estimation;

    public ?MoneySchema $total_fees_estimate;

    #[CastWith(ArrayCaster::class, itemType: FeeDetailSchema::class)]
    public ?FeeDetailListSchema $fee_detail_list;
}
