<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class ShipsFromTypeShema extends DataTransferObject
{
    public ?string $state;

    public ?string $country;
}
