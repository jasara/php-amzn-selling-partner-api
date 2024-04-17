<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShippingOfferingFilterSchema extends BaseSchema
{
    public function __construct(
        public ?bool $include_packing_slip_with_label,
        public ?bool $include_complex_shipping_options,
        #[StringEnumValidator(['CarrierWillPickUp', 'ShipperWillDropOff', 'NoPreference'])]
        public ?string $carrier_will_pick_up,
        #[StringEnumValidator(AmazonEnums::DELIVERY_EXPERIENCE_OPTION)]
        public ?string $delivery_experience,
    ) {
    }
}
