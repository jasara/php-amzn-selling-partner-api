<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class BuyerCustomizedInfoDetailSchema extends BaseSchema
{
    public function __construct(
        public ?string $customized_url,
    ) {
    }
}
