<?php


namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class SellerSKUIdentifierSchema extends DataTransferObject
{
    public string $marketplace_id;

    public string $seller_id;

    public string $seller_sku;
}
