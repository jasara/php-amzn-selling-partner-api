<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class AvailableShippingServiceOptionsSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: AvailableCarrierWillPickUpOptionSchema::class)]
    public AvailableCarrierWillPickUpOptionsListSchema $available_carrier_will_pick_up_options;

    #[CastWith(ArrayCaster::class, itemType: AvailableDeliveryExperienceOptionSchema::class)]
    public AvailableDeliveryExperienceOptionsListSchema $available_delivery_experience_options;
}
