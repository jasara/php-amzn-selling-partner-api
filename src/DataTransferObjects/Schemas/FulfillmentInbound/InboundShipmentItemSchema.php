<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use ArrayObject;
use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class InboundShipmentItemSchema extends DataTransferObject
{
    public ?string $shipment_id;

    public string $seller_sku;

    public ?string $fulfillment_network_sku;

    public int $quantity_shipped;

    public ?int $quantity_received;

    public ?int $quantity_in_case;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $release_date;

    #[CastWith(ArrayCaster::class, itemType: PrepDetailsSchema::class)]
    public ?PrepDetailsListSchema $prep_details_list;

    public function toArrayObject(): ArrayObject
    {
        $prep_details_list = $this->prep_details_list?->map(function ($item) {
            return $item->toArrayObject();
        })->toArray();

        return new ArrayObject(array_filter([
            'ShipmentId' => $this->shipment_id,
            'SellerSKU' => $this->seller_sku,
            'FulfillmentNetworkSKU' => $this->fulfillment_network_sku,
            'QuantityShipped' => $this->quantity_shipped,
            'QuantityReceived' => $this->quantity_received,
            'QuantityInCase' => $this->quantity_in_case,
            'ReleaseDate' => $this->release_date ? $this->release_date->toDateString() : null,
            'PrepDetailsList' => $prep_details_list,
        ]));
    }
}
