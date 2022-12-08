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

    public string $MarketplaceId;

    #[StringEnumValidator(['New', 'Used', 'Collectible', 'Refurbished', 'Club'])]
    public string $ItemCondition;

    #[StringEnumValidator(['Consumer', 'Business'])]
    public ?string $CustomerType;
}
