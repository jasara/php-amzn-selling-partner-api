<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class GetOffersResponseSchema extends DataTransferObject
{
    public ?GetOffersResultSchema $payload;
}
