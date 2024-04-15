<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class TrackingAddressSchema extends DataTransferObject
{
    #[MaxLengthValidator(150)]
    public string $city;

    #[MaxLengthValidator(150)]
    public string $state;

    #[MaxLengthValidator(6)]
    public string $country;
}
