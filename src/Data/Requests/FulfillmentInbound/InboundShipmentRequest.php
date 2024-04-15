<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound;

use Jasara\AmznSPA\Contracts\PascalCaseRequestContract;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\InboundShipmentHeaderSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\InboundShipmentItemListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\InboundShipmentItemSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class InboundShipmentRequest extends BaseRequest implements PascalCaseRequestContract
{
    public InboundShipmentHeaderSchema $inbound_shipment_header;

    #[CastWith(ArrayCaster::class, itemType: InboundShipmentItemSchema::class)]
    public InboundShipmentItemListSchema $inbound_shipment_items;

    public string $marketplace_id;
}
