<?php

namespace Jasara\AmznSPA\Data\Schemas;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;

class AddressSchema extends BaseSchema
{
    public function __construct(
        #[MaxLengthValidator(50)]
        public string $name,
        #[MaxLengthValidator(180)]
        public string $address_line_1,
        #[MaxLengthValidator(60)]
        public ?string $address_line_2,
        #[MaxLengthValidator(25)]
        public ?string $district_or_county,
        #[MaxLengthValidator(30)]
        public ?string $city,
        public ?string $state_or_province_code,
        #[MaxLengthValidator(2)]
        public string $country_code,
        #[MaxLengthValidator(30)]
        public string $postal_code,
        public ?string $email,
        #[MaxLengthValidator(30)]
        public ?string $phone,
    ) {
    }
}
