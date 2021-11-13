<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ErrorListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ErrorSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class UpdateFulfillmentOrderResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: ErrorSchema::class)]
    public ?ErrorListSchema $errors;
}
