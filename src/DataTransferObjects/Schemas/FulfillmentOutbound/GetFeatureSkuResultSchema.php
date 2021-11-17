<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\DataTransferObject;

class GetFeatureSkuResultSchema extends DataTransferObject
{
    public string $marketplace_id;

    public string $feature_name;

    public bool $is_eligible;

    public ?array $ineligible_reasons;

    public FeatureSkuSchema $sku_info;
}
