<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetEligibleShipmentServicesResultSchema extends BaseSchema
{
    public function __construct(
        public ShippingServiceListSchema $shipping_service_list,

        public ?RejectedShippingServiceListSchema $rejected_shipping_service_list,

        public ?TemporarilyUnavailableCarrierListSchema $temporarily_unavailable_carrier_list,

        public ?TermsAndConditionsNotAcceptedCarrierListSchema $terms_and_conditions_not_accepted_carrierList,
    ) {
    }
}
