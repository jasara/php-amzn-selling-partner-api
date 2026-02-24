<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class OrderFulfillmentSchema extends BaseSchema
{
    public function __construct(
        public string $fulfillment_status,
        public ?string $fulfilled_by,
        public ?string $fulfillment_service_level,
        public ?DateTimeRangeSchema $ship_by_window,
        public ?DateTimeRangeSchema $deliver_by_window,
    ) {
    }
}
