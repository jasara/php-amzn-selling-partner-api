<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Spatie\DataTransferObject\DataTransferObject;

class AvailableDeliveryExperienceOptionSchema extends DataTransferObject
{
    public string $delivery_experience_option;

    public MoneySchema $charge;
}
