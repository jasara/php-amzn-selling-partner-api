<?php

namespace Jasara\AmznSPA\Data\Schemas;

use Jasara\AmznSPA\Data\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ShippingAddressSchema extends DataTransferObject
{
    #[MaxLengthValidator(50)]
    public string $name;

    #[MaxLengthValidator(60)]
    public string $address_line_1;

    #[MaxLengthValidator(60)]
    public ?string $address_line_2;

    #[MaxLengthValidator(60)]
    public ?string $address_line_3;

    public string $state_or_region;

    #[MaxLengthValidator(50)]
    public string $city;

    #[MaxLengthValidator(2)]
    public ?string $country_code;

    #[MaxLengthValidator(30)]
    public ?string $postal_code;

    public ?string $email;

    public ?array $copy_emails;

    #[MaxLengthValidator(30)]
    public ?string $phone;
}
