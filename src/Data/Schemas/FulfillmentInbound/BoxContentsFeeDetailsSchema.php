<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Spatie\DataTransferObject\DataTransferObject;

class BoxContentsFeeDetailsSchema extends DataTransferObject
{
    public int $total_units;

    public AmountSchema $fee_per_unit;

    public AmountSchema $total_fee;
}
