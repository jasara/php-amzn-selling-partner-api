<?php

namespace Jasara\AmznSPA\DTOs\Responses;

use Jasara\AmznSPA\DTOs\Casts\ErrorCollectionCaster;
use Jasara\AmznSPA\DTOs\Schemas\ErrorListSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class BaseResponse extends DataTransferObject
{
    #[CastWith(ErrorCollectionCaster::class)]
    public ?ErrorListSchema $error_list;
}
