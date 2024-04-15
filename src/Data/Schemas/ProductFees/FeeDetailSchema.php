<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class FeeDetailSchema extends DataTransferObject
{
    public string $fee_type;

    public MoneySchema $fee_amount;

    public ?MoneySchema $fee_promotion;

    public ?MoneySchema $tax_amount;

    public MoneySchema $final_fee;

    #[CastWith(ArrayCaster::class, itemType: IncludedFeeDetailSchema::class)]
    public ?IncludedFeeDetailListSchema $included_fee_detail_list;
}
