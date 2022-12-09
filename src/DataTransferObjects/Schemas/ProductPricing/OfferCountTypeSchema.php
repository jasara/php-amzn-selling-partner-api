<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class OfferCountTypeSchema extends DataTransferObject
{
    public ?string $condition;

    #[StringEnumValidator(['Amazon', 'Merchant'])]
    public ?string $fulfillment_channel;

    public ?int $offer_count;
}
