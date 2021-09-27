<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetShipmentItemsResultSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: InboundShipmentItemSchema::class)]
    public ?InboundShipmentItemListSchema $item_data;

    public ?string $next_token;
}
