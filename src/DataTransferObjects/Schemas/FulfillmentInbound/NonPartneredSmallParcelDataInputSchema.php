<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class NonPartneredSmallParcelDataInputSchema extends DataTransferObject
{
    public string $carrier_name;

    #[CastWith(ArrayCaster::class, itemType: NonPartneredSmallParcelPackageInputSchema::class)]
    public NonPartneredSmallParcelPackageInputListSchema $package_list;
}
