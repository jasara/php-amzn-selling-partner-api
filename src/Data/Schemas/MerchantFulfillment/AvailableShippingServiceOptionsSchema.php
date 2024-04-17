<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AvailableShippingServiceOptionsSchema extends BaseSchema
{
    public function __construct(
        public AvailableCarrierWillPickUpOptionsListSchema $available_carrier_will_pick_up_options,

        public AvailableDeliveryExperienceOptionsListSchema $available_delivery_experience_options,
    ) {
    }
}
