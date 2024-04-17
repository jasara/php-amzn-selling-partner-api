<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class ShippingServiceOptionsSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(AmazonEnums::DELIVERY_EXPERIENCE_TYPE)]
        public string $delivery_experience,
        public ?MoneySchema $declared_value,
        public bool $carrier_will_pick_up,
        #[StringEnumValidator(['CarrierWillPickUp', 'ShipperWillDropOff', 'NoPreference'])]
        public ?string $carrier_will_pick_up_option,
        #[StringEnumValidator(AmazonEnums::LABEL_FORMAT)]
        public ?string $label_format,
    ) {
    }
}
