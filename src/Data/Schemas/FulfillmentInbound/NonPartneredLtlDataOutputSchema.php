<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class NonPartneredLtlDataOutputSchema extends DataTransferObject
{
    public ?string $carrier_name;

    public ?string $pro_number;
}
