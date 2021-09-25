<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class TransportContentSchema extends DataTransferObject
{
    public TransportHeaderSchema $transport_header;

    public TransportDetailOutputSchema $transport_details;

    public TransportResultSchema $transport_result;
}
