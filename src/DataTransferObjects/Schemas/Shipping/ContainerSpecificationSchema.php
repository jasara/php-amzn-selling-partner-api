<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Schemas\DimensionsSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Spatie\DataTransferObject\DataTransferObject;

class ContainerSpecificationSchema extends DataTransferObject
{
    public DimensionsSchema $dimensions;

    public WeightSchema $weight;
}
