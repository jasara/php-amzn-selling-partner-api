<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\CreateReturnItemListSchema;

class CreateFulfillmentReturnRequest extends BaseRequest
{
    public function __construct(
        public CreateReturnItemListSchema $items,
    ) {
    }
}
