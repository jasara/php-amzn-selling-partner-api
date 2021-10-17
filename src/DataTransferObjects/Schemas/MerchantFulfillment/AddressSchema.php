<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class AddressSchema extends DataTransferObject
{
    #[MaxLengthValidator(30)]
    public string $name;

    #[MaxLengthValidator(180)]
    public string $address_line_1;

    #[MaxLengthValidator(60)]
    public ?string $address_line_2;

    #[MaxLengthValidator(60)]
    public ?string $address_line_3;

    public ?string $district_or_county;

    public string $email;

    #[MaxLengthValidator(30)]
    public string $city;

    #[MaxLengthValidator(30)]
    public ?string $state_or_province_code;

    #[MaxLengthValidator(30)]
    public string $postal_code;

    #[MaxLengthValidator(2)]
    public string $country_code;

    #[MaxLengthValidator(30)]
    public string $phone;
}
