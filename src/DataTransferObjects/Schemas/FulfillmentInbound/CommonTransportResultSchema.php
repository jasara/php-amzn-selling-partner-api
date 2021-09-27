<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class CommonTransportResultSchema extends DataTransferObject
{
    public ?TransportResultSchema $transport_result;
}
