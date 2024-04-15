<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class OfferListingCountTypeSchema extends DataTransferObject
{
    public int $count;

    public string $condition;
}
