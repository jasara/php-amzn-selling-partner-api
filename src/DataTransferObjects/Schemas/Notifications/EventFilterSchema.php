<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class EventFilterSchema extends DataTransferObject
{
    public ?AggregationSettingsSchema $aggregation_settings;

    public ?array $marketplace_ids;

    #[StringEnumValidator(['ANY_OFFER_CHANGED'])]
    public string $event_filter_type;
}
