<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class AvailableCarrierWillPickUpOptionSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(['CarrierWillPickUp', 'ShipperWillDropOff', 'NoPreference'])]
        public string $carrier_will_pick_up_option,
        public MoneySchema $charge,
    ) {
    }
}
