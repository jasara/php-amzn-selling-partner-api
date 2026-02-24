<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class ItemProductSchema extends BaseSchema
{
    public function __construct(
        public ?string $asin,
        public ?string $title,
        public ?string $seller_sku,
        public ?ProductConditionSchema $condition,
        public ?ItemPriceSchema $price,
        public ?array $serial_numbers,
        public ?ProductCustomizationSchema $customization,
    ) {
    }
}
