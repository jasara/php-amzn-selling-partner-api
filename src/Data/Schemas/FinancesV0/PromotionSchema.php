<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PromotionSchema extends BaseSchema
{
    public function __construct(
        public ?string $promotion_type = null,
        public ?string $promotion_id = null,
        public ?CurrencySchema $promotion_amount = null,
    ) {}
}
