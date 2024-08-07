<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class NonPartneredSmallParcelPackageOutputSchema extends BaseSchema
{
    public function __construct(
        public ?string $carrier_name,
        public ?string $tracking_id,
        #[StringEnumValidator(AmazonEnums::PACKAGE_STATUSES)]
        public string $package_status,
    ) {
    }
}
