<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class BuyerRequestedCancelSchema extends BaseSchema
{
    public function __construct(
        public ?string $is_buyer_requested_cancel,
        public ?string $buyer_cancel_reason,
    ) {
    }
}
