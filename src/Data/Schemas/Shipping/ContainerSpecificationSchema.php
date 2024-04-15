<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\DimensionsSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Spatie\DataTransferObject\DataTransferObject;

class ContainerSpecificationSchema extends DataTransferObject
{
    public DimensionsSchema $dimensions;

    public WeightSchema $weight;
}
