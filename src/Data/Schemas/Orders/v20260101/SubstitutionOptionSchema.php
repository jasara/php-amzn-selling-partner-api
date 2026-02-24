<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class SubstitutionOptionSchema extends BaseSchema
{
    public function __construct(
        public ?string $asin,
        public ?int $quantity_ordered,
        public ?string $seller_sku,
        public ?string $title,
        public ?MeasurementSchema $measurement,
    ) {
    }
}
