<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class AuthorizationCodeSchema extends DataTransferObject
{
    public ?string $authorization_code;
}
