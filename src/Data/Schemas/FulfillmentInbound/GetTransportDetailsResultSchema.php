<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetTransportDetailsResultSchema extends BaseSchema
{
    public function __construct(
        public TransportContentSchema $transport_content,
    ) {
    }
}
