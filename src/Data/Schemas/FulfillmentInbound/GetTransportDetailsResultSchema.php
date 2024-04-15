<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class GetTransportDetailsResultSchema extends DataTransferObject
{
    public TransportContentSchema $transport_content;
}
