<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class NonPartneredLtlDataInputSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(AmazonEnums::INBOUND_CARRIER_NAMES)]
        public string $carrier_name,
        public string $pro_number,
    ) {
    }
}
