<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RequestedUpdatesSchema extends BaseSchema
{
    public function __construct(
        public ?BoxUpdateInputSchemaList $boxes,
        public ?ItemInputSchemaList $items,
    ) {
    }
}
