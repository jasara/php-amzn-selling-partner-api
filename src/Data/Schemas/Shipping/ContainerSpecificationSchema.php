<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\DimensionsSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;

class ContainerSpecificationSchema extends BaseSchema
{
    public function __construct(
        public DimensionsSchema $dimensions,
        public WeightSchema $weight,
    ) {
    }
}
