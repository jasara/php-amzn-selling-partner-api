<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class AuthorizationCodeSchema extends DataTransferObject
{
    public ?string $authorization_code;
}
