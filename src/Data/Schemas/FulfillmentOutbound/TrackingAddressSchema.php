<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TrackingAddressSchema extends BaseSchema
{
    public function __construct(
        #[MaxLengthValidator(150)]
        public string $city,
        #[MaxLengthValidator(150)]
        public string $state,
        #[MaxLengthValidator(6)]
        public string $country,
    ) {
    }
}
