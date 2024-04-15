<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetFeatureInventoryResultSchema extends DataTransferObject
{
    public string $marketplace_id;

    public string $feature_name;

    public ?string $next_token;

    #[CastWith(ArrayCaster::class, itemType: FeatureSkuSchema::class)]
    public ?FeatureSkuListSchema $feature_skus;
}
