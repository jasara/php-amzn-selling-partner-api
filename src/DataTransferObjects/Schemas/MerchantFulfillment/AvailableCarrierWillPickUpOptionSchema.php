<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class AvailableCarrierWillPickUpOptionSchema extends DataTransferObject
{
    #[StringEnumValidator(['CarrierWillPickUp', 'ShipperWillDropOff', 'NoPreference'])]
    public string $carrier_will_pick_up_option;

    public MoneySchema $charge;
}
