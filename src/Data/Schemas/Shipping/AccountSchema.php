<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AccountSchema extends BaseSchema
{
    public function __construct(
        public string $account_id,
    ) {
    }
}
