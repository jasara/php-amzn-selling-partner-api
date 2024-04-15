<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class BuyerTaxInfoSchema extends DataTransferObject
{
    public ?string $companylegal_name;

    public ?string $taxing_region;

    #[CastWith(ArrayCaster::class, itemType: TaxClassificationSchema::class)]
    public ?TaxClassificationListSchema $tax_classifications;
}
