<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetAdditionalSellerInputsResultSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: AdditionalInputsSchema::class)]
    public ?AdditionalInputsListSchema $shipment_level_fields;

    #[CastWith(ArrayCaster::class, itemType: ItemLevelFieldsSchema::class)]
    public ?ItemLevelFieldsListSchema $item_level_fields_list;
}
