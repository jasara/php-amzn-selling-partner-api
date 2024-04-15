<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class AggregationSettingsSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::AGGREGATION_TIME_PERIOD)]
    public string $aggregation_time_period;
}
