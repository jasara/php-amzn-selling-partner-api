<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ListAllFulfillmentOrdersResultSchema extends BaseSchema
{
    public function __construct(
        public ?string $next_token,

        public ?FulfillmentOrderListSchema $fulfillment_orders,
    ) {
    }
}
