<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class NonPartneredLtlDataInputSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::CARRIER_NAMES)]
    public string $carrier_name;

    public string $pro_number;
}
