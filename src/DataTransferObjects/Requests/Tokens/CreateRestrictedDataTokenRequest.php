<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\Tokens;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Tokens\RestrictedResourceSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Tokens\RestrictedResourcesListSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CreateRestrictedDataTokenRequest extends BaseRequest
{
    public ?string $target_application;

    #[CastWith(ArrayCaster::class, itemType: RestrictedResourceSchema::class)]
    public RestrictedResourcesListSchema $restricted_resources;
}
