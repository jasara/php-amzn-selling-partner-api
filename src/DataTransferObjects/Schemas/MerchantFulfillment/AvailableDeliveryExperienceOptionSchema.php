<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class AvailableDeliveryExperienceOptionSchema extends DataTransferObject
{
    public string $delivery_experience_option;

    public MoneySchema $charge;
}
