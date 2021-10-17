<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFullfillment;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
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
