<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class LocationSchema extends DataTransferObject
{
    public ?string $state_or_region;

    public ?string $city;

    #[MaxLengthValidator(2)]
    public ?string $country_code;

    #[MaxLengthValidator(20)]
    public ?string $postal_code;
}
