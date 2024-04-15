<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetFulfillmentPreviewResultSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: FulfillmentPreviewSchema::class)]
    public ?FulfillmentPreviewListSchema $fulfillment_previews;
}
