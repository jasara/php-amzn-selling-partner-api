<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CreateFulfillmentReturnResultSchema extends BaseSchema
{
    public function __construct(
        public ?ReturnItemListSchema $return_items,

        public ?InvalidReturnItemListSchema $invalid_return_items,

        public ?ReturnAuthorizationListSchema $return_authorizations,
    ) {
    }
}
