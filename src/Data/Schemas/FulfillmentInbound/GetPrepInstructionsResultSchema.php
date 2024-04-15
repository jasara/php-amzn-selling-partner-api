<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetPrepInstructionsResultSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: SKUPrepInstructionsSchema::class)]
    public ?SKUPrepInstructionsListSchema $sku_prep_instructions_list;

    #[CastWith(ArrayCaster::class, itemType: InvalidSKUSchema::class)]
    public ?InvalidSKUListSchema $invalid_sku_list;

    #[CastWith(ArrayCaster::class, itemType: ASINPrepInstructionsSchema::class)]
    public ?ASINPrepInstructionsListSchema $asin_prep_instructions_list;

    #[CastWith(ArrayCaster::class, itemType: InvalidASINSchema::class)]
    public ?InvalidASINListSchema $invalid_asin_list;
}
