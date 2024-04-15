<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class CommonTransportResultSchema extends DataTransferObject
{
    public ?TransportResultSchema $transport_result;
}
