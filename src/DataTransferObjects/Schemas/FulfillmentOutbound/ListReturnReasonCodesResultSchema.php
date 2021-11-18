<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ListReturnReasonCodesResultSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType:ReasonCodeDetailsSchema::class)]
    public ?ReasonCodeDetailsListSchema $reason_code_details;
}
