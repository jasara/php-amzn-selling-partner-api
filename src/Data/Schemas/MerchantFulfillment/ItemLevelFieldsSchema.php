<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ItemLevelFieldsSchema extends DataTransferObject
{
    public string $asin;

    #[CastWith(ArrayCaster::class, itemType: AdditionalInputsSchema::class)]
    public AdditionalInputsListSchema $additional_inputs;
}
