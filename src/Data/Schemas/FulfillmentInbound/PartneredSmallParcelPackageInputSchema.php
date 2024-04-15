<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\DimensionsSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Spatie\DataTransferObject\DataTransferObject;

class PartneredSmallParcelPackageInputSchema extends DataTransferObject
{
    public DimensionsSchema $dimensions;

    public WeightSchema $weight;
}
