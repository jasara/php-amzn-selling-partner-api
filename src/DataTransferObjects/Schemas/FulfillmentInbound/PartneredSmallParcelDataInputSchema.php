<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class PartneredSmallParcelDataInputSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: PartneredSmallParcelPackageInputSchema::class)]
    public ?PartneredSmallParcelPackageInputListSchema $package_list;

    #[StringEnumValidator(AmazonEnums::CARRIER_NAMES)]
    public ?string $carrier_name;
}
