<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CommonTransportResultSchema extends BaseSchema
{
    public function __construct(
        public ?TransportResultSchema $transport_result,
    ) {
    }
}
