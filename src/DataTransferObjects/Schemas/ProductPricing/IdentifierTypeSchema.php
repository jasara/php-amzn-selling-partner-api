<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class IdentifierTypeSchema extends DataTransferObject
{
    public AsinIdentifierSchema $marketplace_asin;

    public ?SellerSKUIdentifierSchema $SKU_identifier;
}
