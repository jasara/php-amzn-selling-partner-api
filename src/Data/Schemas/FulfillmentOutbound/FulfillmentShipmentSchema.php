<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class FulfillmentShipmentSchema extends DataTransferObject
{
    public string $amazon_shipment_id;

    public string $fulfillment_center_id;

    #[StringEnumValidator(['PENDING', 'SHIPPED', 'CANCELLED_BY_FULFILLER', 'CANCELLED_BY_SELLER'])]
    public string $fulfillment_shipment_status;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $shipping_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $estimated_arrival_date;

    public ?array $shipping_notes;

    #[CastWith(ArrayCaster::class, itemType: FulfillmentShipmentItemSchema::class)]
    public FulfillmentShipmentItemListSchema $fulfillment_shipment_item;

    #[CastWith(ArrayCaster::class, itemType: FulfillmentShipmentPackageSchema::class)]
    public ?FulfillmentShipmentPackageListSchema $fulfillment_shipment_package;
}
