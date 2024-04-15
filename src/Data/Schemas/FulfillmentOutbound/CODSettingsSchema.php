<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Spatie\DataTransferObject\DataTransferObject;

class CODSettingsSchema extends DataTransferObject
{
    public bool $is_cod_required;

    public ?AmountSchema $cod_charge;

    public ?AmountSchema $cod_charge_tax;

    public ?AmountSchema $shipping_charge;

    public ?AmountSchema $shipping_charge_tax;
}
