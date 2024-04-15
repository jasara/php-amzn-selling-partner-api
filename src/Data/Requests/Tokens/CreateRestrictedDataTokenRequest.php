<?php

namespace Jasara\AmznSPA\Data\Requests\Tokens;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Tokens\RestrictedResourceSchema;
use Jasara\AmznSPA\Data\Schemas\Tokens\RestrictedResourcesListSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CreateRestrictedDataTokenRequest extends BaseRequest
{
    public ?string $target_application;

    #[CastWith(ArrayCaster::class, itemType: RestrictedResourceSchema::class)]
    public RestrictedResourcesListSchema $restricted_resources;
}
