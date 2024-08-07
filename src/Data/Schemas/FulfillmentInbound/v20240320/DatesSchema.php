<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class DatesSchema extends BaseSchema
{
    public function __construct(
        public ?WindowSchema $delivery_window,
        public ?WindowSchema $ready_to_ship_window,
    ) {
    }
}
