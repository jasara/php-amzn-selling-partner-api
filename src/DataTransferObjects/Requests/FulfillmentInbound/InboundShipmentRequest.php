<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound;

use ArrayObject;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\InboundShipmentHeaderSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\InboundShipmentItemListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\InboundShipmentItemSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class InboundShipmentRequest extends DataTransferObject
{
    public InboundShipmentHeaderSchema $inbound_shipment_header;

    #[CastWith(ArrayCaster::class, itemType: InboundShipmentItemSchema::class)]
    public InboundShipmentItemListSchema $inbound_shipment_items;

    public string $marketplace_id;

    public function toArrayObject(): ArrayObject
    {
        $items = $this->inbound_shipment_items->map(function ($item) {
            return $item->toArrayObject();
        })->toArray();

        return new ArrayObject(array_filter([
            'InboundShipmentHeader' => $this->inbound_shipment_header->toArrayObject(),
            'InboundShipmentItems' => $items,
            'MarketplaceId' => $this->marketplace_id,
        ]));
    }
}
