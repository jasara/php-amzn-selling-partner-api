<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class IdentifierTypeSchema extends DataTransferObject
{
    public AsinIdentifierSchema $marketplace_asin;

    public ?SellerSKUIdentifierSchema $sku_identifier;
}
