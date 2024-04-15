<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class PartneredSmallParcelDataInputSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: PartneredSmallParcelPackageInputSchema::class)]
    public ?PartneredSmallParcelPackageInputListSchema $package_list;

    public ?string $carrier_name;
}
