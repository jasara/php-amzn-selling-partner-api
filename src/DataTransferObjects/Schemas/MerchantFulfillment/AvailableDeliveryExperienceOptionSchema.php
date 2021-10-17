<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Schemas\AmountSchema;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class AvailableDeliveryExperienceOptionSchema extends DataTransferObject
{
    public string $delivery_experience_option;

    #[MapFrom('value')]
    public AmountSchema $charge;
}
