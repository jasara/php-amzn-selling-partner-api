<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class SalesRankTypeSchema extends DataTransferObject
{
    public string $product_category_id;

    public int $rank;
}
