<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OfferCountTypeSchema extends BaseSchema
{
    public function __construct(
        public ?string $condition,
        #[StringEnumValidator(['Amazon', 'Merchant'])]
        public ?string $fullfillment_channel,
        public ?int $offer_count,
    ) {
    }
}
