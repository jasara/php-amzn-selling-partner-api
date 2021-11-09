<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ShippingServiceOptionsSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::DELIVERY_EXPERIENCE_TYPE)]
    public string $delivery_experience;

    public ?MoneySchema $declared_value;

    public bool $carrier_will_pick_up;

    #[StringEnumValidator(['CarrierWillPickUp', 'ShipperWillDropOff', 'NoPreference'])]
    public ?string $carrier_will_pick_up_option;

    #[StringEnumValidator(AmazonEnums::LABEL_FORMAT)]
    public ?string $label_format;
}
