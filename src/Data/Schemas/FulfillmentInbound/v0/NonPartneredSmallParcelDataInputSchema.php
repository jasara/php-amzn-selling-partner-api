<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class NonPartneredSmallParcelDataInputSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(AmazonEnums::INBOUND_CARRIER_NAMES)]
        public string $carrier_name,
        public NonPartneredSmallParcelPackageInputListSchema $package_list,
    ) {
    }
}
