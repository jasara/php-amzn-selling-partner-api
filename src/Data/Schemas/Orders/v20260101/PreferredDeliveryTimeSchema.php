<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class PreferredDeliveryTimeSchema extends BaseSchema
{
    public function __construct(
        public ?BusinessHourListSchema $business_hours,
        public ?ExceptionDateListSchema $exception_dates,
    ) {
    }
}
