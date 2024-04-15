<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class AvailableCarrierWillPickUpOptionSchema extends DataTransferObject
{
    #[StringEnumValidator(['CarrierWillPickUp', 'ShipperWillDropOff', 'NoPreference'])]
    public string $carrier_will_pick_up_option;

    public MoneySchema $charge;
}
