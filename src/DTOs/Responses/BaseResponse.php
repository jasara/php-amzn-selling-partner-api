<?php

namespace Jasara\AmznSPA\DTOs\Responses;

use Jasara\AmznSPA\DTOs\Schemas\ErrorListSchema;
use Jasara\AmznSPA\DTOs\Schemas\ErrorSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class BaseResponse extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: ErrorSchema::class)]
    public ?ErrorListSchema $error_list;
}
