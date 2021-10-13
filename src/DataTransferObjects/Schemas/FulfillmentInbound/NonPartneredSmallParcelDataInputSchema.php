<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class NonPartneredSmallParcelDataInputSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::INBOUND_CARRIER_NAMES)]
    public string $carrier_name;

    #[CastWith(ArrayCaster::class, itemType: NonPartneredSmallParcelPackageInputSchema::class)]
    public NonPartneredSmallParcelPackageInputListSchema $package_list;
}
