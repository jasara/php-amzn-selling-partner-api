<?php

namespace Jasara\AmznSPA\Data\Schemas;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;

class AddressSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['max:50'])]
        public string $name,
        #[MaxLengthValidator(180)]
        public string $address_line_1,
        #[MaxLengthValidator(60)]
        public ?string $address_line_2,
        #[RuleValidator(['min:1', 'max:50'])]
        public ?string $company_name,
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
        public ?string $phone_number,
    ) {
    }
}
