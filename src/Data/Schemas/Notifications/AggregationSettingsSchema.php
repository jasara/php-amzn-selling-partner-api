<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AggregationSettingsSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(AmazonEnums::AGGREGATION_TIME_PERIOD)]
        public string $aggregation_time_period,
    ) {
    }
}
