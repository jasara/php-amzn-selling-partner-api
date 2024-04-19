<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetTransportDetailsResultSchema extends BaseSchema
{
    public function __construct(
        public TransportContentSchema $transport_content,
    ) {
    }
}
