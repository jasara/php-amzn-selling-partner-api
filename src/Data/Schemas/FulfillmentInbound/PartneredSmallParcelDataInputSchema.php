<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PartneredSmallParcelDataInputSchema extends BaseSchema
{
    public function __construct(
        public ?PartneredSmallParcelPackageInputListSchema $package_list,
        public ?string $carrier_name,
    ) {
    }
}
