<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Sales;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderMetricsIntervalSchema extends BaseSchema
{
    public function __construct(
        public ?string $interval = null,
        public ?int $unit_count = null,
        public ?int $order_item_count = null,
        public ?int $order_count = null,
        public ?MoneySchema $average_unit_price = null,
        public ?MoneySchema $total_sales = null,
    ) {}
}
