<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

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
}
