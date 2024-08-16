<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SellersAddressSchema extends BaseSchema
{
    public function __construct(
        public string $address_line_1,
        public ?string $address_line_2,
        public ?string $city,
        public ?string $state_or_province_code,
        #[MaxLengthValidator(2)]
        public string $country_code,
        public string $postal_code,
    ) {
    }
}
