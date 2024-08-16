<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class BusinessSchema extends BaseSchema
{
    public function __construct(
        public string $name,
        public SellersAddressSchema $registered_business_address,
        public ?string $company_registration_number,
        public ?string $company_tax_identification_number,
        public ?string $non_latin_name,
    ) {
    }
}
