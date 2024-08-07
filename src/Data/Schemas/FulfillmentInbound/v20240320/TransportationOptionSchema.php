<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportationOptionSchema extends BaseSchema
{
    public function __construct(
        public CarrierSchema $carrier,
        public ?CarrierAppointmentSchema $carrier_appointment,
        public array $preconditions,
        public ?QuoteSchema $quote,
        #[RuleValidator(['size:38'])]
        public string $shipment_id,
        public ShippingMode $shipping_mode,
        public ShippingSolution $shipping_solution,
        #[RuleValidator(['size:38'])]
        public string $transportation_option_id,
    ) {
    }
}
