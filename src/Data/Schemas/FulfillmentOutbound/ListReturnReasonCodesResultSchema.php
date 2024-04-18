<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ListReturnReasonCodesResultSchema extends BaseSchema
{
    public function __construct(
        public ?ReasonCodeDetailsListSchema $reason_code_details,
    ) {
    }
}
