<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class ListingOffersResponseSchema extends DataTransferObject
{
    public ?array $headers;

    // status

    public GetOffersResponseSchema $body;

}
