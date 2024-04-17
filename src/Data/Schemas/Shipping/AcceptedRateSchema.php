<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;

class AcceptedRateSchema extends BaseSchema
{
    public function __construct(
        public ?CurrencySchema $total_charge,
        public ?WeightSchema $billed_weight,
        #[StringEnumValidator(['Amazon Shipping Ground', 'Amazon Shipping Standard', 'Amazon Shipping Premium'])]
        public ?string $service_type,
        public ?ShippingPromiseSetSchema $promise,
    ) {
    }
}
