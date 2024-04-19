<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\DimensionsSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;

class PartneredSmallParcelPackageInputSchema extends BaseSchema
{
    public function __construct(
        public DimensionsSchema $dimensions,
        public WeightSchema $weight,
    ) {
    }
}
