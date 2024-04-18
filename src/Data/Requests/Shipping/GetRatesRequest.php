<?php

namespace Jasara\AmznSPA\Data\Requests\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Shipping\ContainerSpecificationListSchema;
use Jasara\AmznSPA\Data\Schemas\Shipping\ServiceTypeListSchema;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;

class GetRatesRequest extends BaseRequest
{
    public function __construct(
        public ShippingAddressSchema $ship_to,
        public ShippingAddressSchema $ship_from,
        public ServiceTypeListSchema $service_types,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $ship_date,
        public ContainerSpecificationListSchema $container_specifications,
    ) {
    }
}
