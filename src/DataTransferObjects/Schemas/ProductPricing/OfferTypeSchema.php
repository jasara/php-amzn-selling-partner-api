<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;

use Spatie\DataTransferObject\DataTransferObject;

class OfferTypeSchema extends DataTransferObject
{
    #[StringEnumValidator(['B2C', 'B2B'])]
    public string $offer_type;
}
