<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class MerchantFulfillmentAddressSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['max:30'])]
        public string $name,
        #[MaxLengthValidator(180)]
        public string $address_line_1,
        #[MaxLengthValidator(60)]
        public ?string $address_line_2,
        #[MaxLengthValidator(60)]
        public ?string $address_line_3,
        public ?string $district_or_county,
        #[MaxLengthValidator(30)]
        public ?string $city,
        #[MaxLengthValidator(30)]
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
