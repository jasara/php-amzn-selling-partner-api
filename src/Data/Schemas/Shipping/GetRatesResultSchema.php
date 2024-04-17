<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetRatesResultSchema extends BaseSchema
{
    public function __construct(
        public ServiceRateListSchema $service_rates,
    ) {
    }
}
