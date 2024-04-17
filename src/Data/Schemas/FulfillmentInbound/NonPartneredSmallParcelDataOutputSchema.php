<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class NonPartneredSmallParcelDataOutputSchema extends BaseSchema
{
    public function __construct(
        public NonPartneredSmallParcelPackageOutputListSchema $package_list,
    ) {
    }
}
