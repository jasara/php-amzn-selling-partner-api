<?php

namespace Jasara\AmznSPA\Data\Requests\Tokens;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Tokens\RestrictedResourcesListSchema;

class CreateRestrictedDataTokenRequest extends BaseRequest
{
    public function __construct(
        public ?string $target_application,
        public RestrictedResourcesListSchema $restricted_resources,
    ) {
    }
}
