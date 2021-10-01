<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound;

use Jasara\AmznSPA\Contracts\PascalCaseRequestContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\InboundShipmentHeaderSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\InboundShipmentItemListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\InboundShipmentItemSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class InboundShipmentRequest extends BaseRequest implements PascalCaseRequestContract
{
    public InboundShipmentHeaderSchema $inbound_shipment_header;

    #[CastWith(ArrayCaster::class, itemType: InboundShipmentItemSchema::class)]
    public InboundShipmentItemListSchema $inbound_shipment_items;

    public string $marketplace_id;
}
