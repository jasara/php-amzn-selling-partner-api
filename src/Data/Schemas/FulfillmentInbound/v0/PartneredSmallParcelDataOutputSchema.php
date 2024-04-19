<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PartneredSmallParcelDataOutputSchema extends BaseSchema
{
    public function __construct(
        public PartneredSmallParcelPackageOutputListSchema $package_list,
        public ?PartneredEstimateSchema $partnered_estimate,
    ) {
    }
}
