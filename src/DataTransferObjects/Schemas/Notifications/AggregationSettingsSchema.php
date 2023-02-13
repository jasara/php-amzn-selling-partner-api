<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class AggregationSettingsSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::AGGREGATION_TIME_PERIOD)]
    public string $aggregation_time_period;
}
