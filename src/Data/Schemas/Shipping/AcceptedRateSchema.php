<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\WeightSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class AcceptedRateSchema extends DataTransferObject
{
    public ?CurrencySchema $total_charge;

    public ?WeightSchema $billed_weight;

    #[StringEnumValidator(['Amazon Shipping Ground', 'Amazon Shipping Standard', 'Amazon Shipping Premium'])]
    public ?string $service_type;

    public ?ShippingPromiseSetSchema $promise;
}
