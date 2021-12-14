<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductFees;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class IncludedFeeDetailSchema extends DataTransferObject
{
    public string $fee_type;

    public MoneySchema $fee_amount;

    public ?MoneySchema $fee_promotion;

    public ?MoneySchema $tax_amount;

    public MoneySchema $final_fee;
}
