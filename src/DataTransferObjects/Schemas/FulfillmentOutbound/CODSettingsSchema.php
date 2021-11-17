<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Schemas\AmountSchema;
use Spatie\DataTransferObject\DataTransferObject;

class CODSettingsSchema extends DataTransferObject
{
    public bool $is_cod_required;

    public ?AmountSchema $cod_charge;

    public ?AmountSchema $cod_charge_tax;

    public ?AmountSchema $shipping_charge;

    public ?AmountSchema $shipping_charge_tax;
}
