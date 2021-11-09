<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas;

use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ShippingAddressSchema extends DataTransferObject
{
    #[MaxLengthValidator(50)]
    public string $name;

    #[MaxLengthValidator(180)]
    public ?string $address_line_1;

    #[MaxLengthValidator(60)]
    public ?string $address_line_2;

    #[MaxLengthValidator(30)]
    public ?string $city;

    #[MaxLengthValidator(25)]
    public ?string $county;

    public ?string $district;

    public ?string $state_or_region;

    public ?string $municipality;

    #[MaxLengthValidator(30)]
    public ?string $postal_code;

    #[MaxLengthValidator(2)]
    public ?string $country_code;

    public ?string $email;

    public ?array $copy_emails;

    #[MaxLengthValidator(30)]
    public ?string $phone;

    #[StringEnumValidator(['Residential', 'Commercial'])]
    public ?string $address_type;
}
