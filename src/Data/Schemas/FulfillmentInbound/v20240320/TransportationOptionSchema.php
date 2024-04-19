<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportationOptionSchema extends BaseSchema
{
    public function __construct(
        public ?AppointmentSlotSchema $appointment_slot,
        public CarrierSchema $carrier,
        #[RuleValidator(['size:38'])]
        public string $inbound_plan_id,
        #[RuleValidator(['size:38'])]
        public string $placement_option_id,
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
