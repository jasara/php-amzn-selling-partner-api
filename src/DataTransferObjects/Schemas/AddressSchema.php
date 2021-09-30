<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas;

use ArrayObject;
use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class AddressSchema extends DataTransferObject
{
    #[MaxLengthValidator(50)]
    public string $name;

    #[MaxLengthValidator(180)]
    public string $address_line_1;

    #[MaxLengthValidator(60)]
    public ?string $address_line_2;

    #[MaxLengthValidator(25)]
    public ?string $district_or_county;

    #[MaxLengthValidator(30)]
    public string $city;

    public string $state_or_province_code;

    #[MaxLengthValidator(2)]
    public string $country_code;

    #[MaxLengthValidator(30)]
    public string $postal_code;

    public function toArrayObject(): ArrayObject
    {
        return new ArrayObject(array_filter([
            'Name' => $this->name,
            'AddressLine1' => $this->address_line_1,
            'AddressLine2' => $this->address_line_2,
            'DistrictOrCounty' => $this->district_or_county,
            'City' => $this->city,
            'StateOrProvinceCode' => $this->state_or_province_code,
            'CountryCode' => $this->country_code,
            'PostalCode' => $this->postal_code,
        ]));
    }
}
