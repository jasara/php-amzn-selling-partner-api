<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class EventFilterSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(['ANY_OFFER_CHANGED'])]
        public string $event_filter_type,
        public array $order_change_types,
        public ?AggregationSettingsSchema $aggregation_settings,
        public ?array $marketplace_ids
    ) {
    }
}
