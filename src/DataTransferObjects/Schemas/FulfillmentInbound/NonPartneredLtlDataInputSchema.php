<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class NonPartneredLtlDataInputSchema extends DataTransferObject
{
    public string $carrier_name;

    public string $pro_number;
}
