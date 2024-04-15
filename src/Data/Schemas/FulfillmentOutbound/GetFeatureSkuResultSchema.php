<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\DataTransferObject;

class GetFeatureSkuResultSchema extends DataTransferObject
{
    public string $marketplace_id;

    public string $feature_name;

    public bool $is_eligible;

    public ?array $ineligible_reasons;

    public FeatureSkuSchema $sku_info;
}
