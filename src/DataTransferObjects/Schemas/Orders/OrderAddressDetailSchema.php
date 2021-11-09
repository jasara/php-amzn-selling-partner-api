<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class OrderAddressDetailSchema extends DataTransferObject
{
    public ?string $name;

    public ?string $address_line_1;

    public ?string $address_line_2;

    public ?string $address_line_3;

    public ?string $city;

    public ?string $county;

    public ?string $district;

    public ?string $state_or_region;

    public ?string $municipality;

    public ?string $postal_code;

    #[MaxLengthValidator(2)]
    public ?string $country_code;

    public ?string $phone;

    #[StringEnumValidator(['Residential', 'Commercial'])]
    public ?string $address_type;
}
