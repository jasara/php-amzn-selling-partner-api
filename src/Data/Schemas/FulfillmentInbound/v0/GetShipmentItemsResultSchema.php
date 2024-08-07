<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetShipmentItemsResultSchema extends BaseSchema
{
    public function __construct(
        public ?InboundShipmentItemListSchema $item_data,
        public ?string $next_token,
    ) {
    }
}
