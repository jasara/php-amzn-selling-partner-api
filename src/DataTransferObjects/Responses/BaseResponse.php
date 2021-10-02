<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses;

use Jasara\AmznSPA\DataTransferObjects\Schemas\ErrorListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ErrorSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MetadataSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class BaseResponse extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: ErrorSchema::class)]
    public ?ErrorListSchema $errors;

    public ?MetadataSchema $metadata;
}
