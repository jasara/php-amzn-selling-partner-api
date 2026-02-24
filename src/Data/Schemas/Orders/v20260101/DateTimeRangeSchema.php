<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class DateTimeRangeSchema extends BaseSchema
{
    public function __construct(
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $earliest_date_time,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $latest_date_time,
    ) {
    }
}
