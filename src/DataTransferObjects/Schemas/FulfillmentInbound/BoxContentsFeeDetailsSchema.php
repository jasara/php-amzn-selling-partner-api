<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Schemas\AmountSchema;
use Spatie\DataTransferObject\DataTransferObject;

class BoxContentsFeeDetailsSchema extends DataTransferObject
{
    public int $total_units;

    public AmountSchema $fee_per_unit;

    public AmountSchema $total_fee;
}
