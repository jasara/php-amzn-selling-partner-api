<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ListingOffersRequestSchema extends DataTransferObject
{
    public string $uri;

    #[StringEnumValidator(['GET', 'POST', 'PATCH', 'DELETE'])]
    public string $method = 'GET';

    public ?array $headers;

    public string $marketplace_id;

    #[StringEnumValidator(['New', 'Used', 'Collectible', 'Refurbished', 'Club'])]
    public string $item_condition;

    #[StringEnumValidator(['Consumer', 'Business'])]
    public ?string $customer_type;
}
