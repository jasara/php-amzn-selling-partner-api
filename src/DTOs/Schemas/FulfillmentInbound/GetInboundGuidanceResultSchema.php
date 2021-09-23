<?php

namespace Jasara\AmznSPA\DTOs\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetInboundGuidanceResultSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: SKUInboundGuidanceSchema::class)]
    public ?SKUInboundGuidanceListSchema $sku_inbound_guidance_list;

    #[CastWith(ArrayCaster::class, itemType: InvalidSKUSchema::class)]
    public ?InvalidSKUListSchema $invalid_sku_list;

    #[CastWith(ArrayCaster::class, itemType: ASINInboundGuidanceSchema::class)]
    public ?ASINInboundGuidanceListSchema $asin_inbound_guidance_list;

    #[CastWith(ArrayCaster::class, itemType: InvalidASINSchema::class)]
    public ?InvalidASINListSchema  $invalid_asin_list;
}
