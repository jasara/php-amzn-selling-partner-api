<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class BuyerSchema extends BaseSchema
{
    public function __construct(
        public ?string $buyer_name,
        public ?string $buyer_email,
        public ?string $buyer_company_name,
        public ?string $buyer_purchase_order_number,
    ) {
    }
}
