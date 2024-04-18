<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class EventSchema extends BaseSchema
{
    public function __construct(
        #[MaxLengthValidator(60)]
        public string $event_code,
        #[CarbonFromStringCaster]
        public CarbonImmutable $event_time,
        public ?LocationSchema $location,
    ) {
    }
}
