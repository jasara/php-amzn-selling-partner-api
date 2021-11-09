<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Schemas\WeightSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ServiceRateSchema extends DataTransferObject
{
    public CurrencySchema $total_charge;

    public WeightSchema $billable_weight;

    #[StringEnumValidator(['Amazon Shipping Ground', 'Amazon Shipping Standard', 'Amazon Shipping Premium'])]
    public string $service_type;

    public ShippingPromiseSetSchema $promise;
}
