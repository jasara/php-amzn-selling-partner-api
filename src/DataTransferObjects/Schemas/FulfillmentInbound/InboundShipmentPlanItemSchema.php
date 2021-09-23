<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class InboundShipmentPlanItemSchema extends DataTransferObject
{
    public string $seller_sku;

    public string $fulfillment_network_sku;

    public int $quantity;

    #[CastWith(ArrayCaster::class, itemType: PrepDetailsSchema::class)]
    public ?PrepDetailsListSchema $prep_details_list;
}
