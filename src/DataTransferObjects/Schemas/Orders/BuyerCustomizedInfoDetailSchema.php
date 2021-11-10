<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Spatie\DataTransferObject\DataTransferObject;

class BuyerCustomizedInfoDetailSchema extends DataTransferObject
{
    public ?string $customized_url;
}
