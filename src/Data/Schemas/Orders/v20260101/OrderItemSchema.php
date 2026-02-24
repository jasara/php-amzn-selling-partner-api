<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class OrderItemSchema extends BaseSchema
{
    public function __construct(
        public string $order_item_id,
        public int $quantity_ordered,
        public ItemProductSchema $product,
        public ?MeasurementSchema $measurement,
        public ?array $programs,
        public ?ItemProceedsSchema $proceeds,
        public ?ItemExpenseSchema $expense,
        public ?ItemPromotionSchema $promotion,
        public ?ItemCancellationSchema $cancellation,
        public ?ItemFulfillmentSchema $fulfillment,
    ) {
    }
}
