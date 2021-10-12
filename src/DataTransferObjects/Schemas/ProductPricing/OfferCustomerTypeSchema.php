<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;

use Spatie\DataTransferObject\DataTransferObject;

class OfferCustomerTypeSchema extends DataTransferObject
{
    #[StringEnumValidator(['B2C', 'B2B'])]
    public string $offer_customer_type;
}
