<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class NonPartneredSmallParcelDataOutputSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: NonPartneredSmallParcelPackageOutputSchema::class)]
    public NonPartneredSmallParcelPackageOutputListSchema $package_list;
}
