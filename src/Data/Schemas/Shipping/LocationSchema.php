<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LocationSchema extends BaseSchema
{
    public function __construct(
        public ?string $state_or_region,
        public ?string $city,
        #[MaxLengthValidator(2)]
        public ?string $country_code,
        #[MaxLengthValidator(20)]
        public ?string $postal_code,
    ) {
    }
}
