<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class NonPartneredLtlDataInputSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::INBOUND_CARRIER_NAMES)]
    public string $carrier_name;

    public string $pro_number;
}
