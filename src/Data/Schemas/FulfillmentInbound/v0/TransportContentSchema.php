<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportContentSchema extends BaseSchema
{
    public function __construct(
        public TransportHeaderSchema $transport_header,
        public TransportDetailOutputSchema $transport_details,
        public TransportResultSchema $transport_result,
    ) {
    }
}
