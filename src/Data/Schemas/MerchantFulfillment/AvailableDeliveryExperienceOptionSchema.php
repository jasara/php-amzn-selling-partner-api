<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class AvailableDeliveryExperienceOptionSchema extends BaseSchema
{
    public function __construct(
        public string $delivery_experience_option,
        public MoneySchema $charge,
    ) {
    }
}
