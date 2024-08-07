<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\TransportationSelectionSchemaList;

class ConfirmTransportationOptionsRequest extends BaseRequest
{
    public function __construct(
        public TransportationSelectionSchemaList $transportation_selections,
    ) {
    }
}
