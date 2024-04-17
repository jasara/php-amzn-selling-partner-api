<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AuthorizationCodeSchema extends BaseSchema
{
    public function __construct(
        public ?string $authorization_code,
    ) {
    }
}
