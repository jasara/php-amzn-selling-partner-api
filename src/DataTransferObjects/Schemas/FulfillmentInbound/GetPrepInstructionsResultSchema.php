<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetPrepInstructionsResultSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: SKUPrepInstructionsSchema::class)]
    public ?SKUPrepInstructionsListSchema $sku_prep_instructions_list;
}
