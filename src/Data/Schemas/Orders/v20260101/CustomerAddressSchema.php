<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class CustomerAddressSchema extends BaseSchema
{
    public function __construct(
        public ?string $name,
        public ?string $company_name,
        public ?string $address_line_1,
        public ?string $address_line_2,
        public ?string $address_line_3,
        public ?string $city,
        public ?string $district_or_county,
        public ?string $state_or_region,
        public ?string $municipality,
        public ?string $postal_code,
        public ?string $country_code,
        public ?string $phone,
        public ?AddressExtendedFieldsSchema $extended_fields,
        public ?string $address_type,
    ) {
    }
}
