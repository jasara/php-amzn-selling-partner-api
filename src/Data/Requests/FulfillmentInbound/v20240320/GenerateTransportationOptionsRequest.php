<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ShipmentTransportationConfigurationListSchema;

class GenerateTransportationOptionsRequest extends BaseRequest
{
    public function __construct(
        #[RuleValidator(['size:38'])]
        public string $placement_option_id,
        public ShipmentTransportationConfigurationListSchema $shipment_transportation_configurations,
    ) {
    }
}
