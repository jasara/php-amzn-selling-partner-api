<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class PartneredSmallParcelDataOutputSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: PartneredSmallParcelPackageOutputSchema::class)]
    public PartneredSmallParcelPackageOutputListSchema $package_list;

    public ?PartneredEstimateSchema $partnered_estimate;
}
