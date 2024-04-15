<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\DataTransferObject;

class FeatureSkuSchema extends DataTransferObject
{
    public ?string $seller_sku;

    public ?string $fn_sku;

    public ?string $asin;

    public ?string $sku_count;

    public ?array $overlapping_skus;
}
