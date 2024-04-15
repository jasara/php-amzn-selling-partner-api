<?php

namespace Jasara\AmznSPA\Data\Responses;

use Jasara\AmznSPA\Data\Schemas\ErrorListSchema;
use Jasara\AmznSPA\Data\Schemas\ErrorSchema;
use Jasara\AmznSPA\Data\Schemas\MetadataSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class BaseResponse extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: ErrorSchema::class)]
    public ?ErrorListSchema $errors;

    public ?MetadataSchema $metadata;
}
