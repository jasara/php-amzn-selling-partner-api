<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ShippingOfferingFilterSchema extends DataTransferObject
{
    public ?bool $include_packing_slip_with_label;

    public ?bool $include_complex_shipping_options;

    #[StringEnumValidator(['CarrierWillPickUp', 'ShipperWillDropOff', 'NoPreference'])]
    public ?string $carrier_will_pick_up;

    #[StringEnumValidator(AmazonEnums::DELIVERY_EXPERIENCE_OPTION)]
    public ?string $delivery_experience;
}
