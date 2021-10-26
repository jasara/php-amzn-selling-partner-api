<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ErrorListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ErrorSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CancelShipmentResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: ErrorSchema::class)]
    public ?ErrorListSchema $errors;
}
