<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class PriceSchema extends DataTransferObject
{
    public string $status;

    public ?string $seller_sku;

    public ?string $asin;

    public ?ProductSchema $product;
}
