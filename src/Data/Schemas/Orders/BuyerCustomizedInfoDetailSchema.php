<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Spatie\DataTransferObject\DataTransferObject;

class BuyerCustomizedInfoDetailSchema extends DataTransferObject
{
    public ?string $customized_url;
}
