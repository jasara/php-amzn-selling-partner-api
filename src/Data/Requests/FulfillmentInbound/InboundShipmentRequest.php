<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound;

use Jasara\AmznSPA\Contracts\PascalCaseRequestContract;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\InboundShipmentHeaderSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\InboundShipmentItemListSchema;

class InboundShipmentRequest extends BaseRequest implements PascalCaseRequestContract
{
    public function __construct(
        public InboundShipmentHeaderSchema $inbound_shipment_header,
        public InboundShipmentItemListSchema $inbound_shipment_items,
        public string $marketplace_id,
    ) {
    }
}
