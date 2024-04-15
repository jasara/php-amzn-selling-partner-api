<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class OfferCountTypeSchema extends DataTransferObject
{
    public ?string $condition;

    #[StringEnumValidator(['Amazon', 'Merchant'])]
    public ?string $fullfillment_channel;

    public ?int $offer_count;
}
