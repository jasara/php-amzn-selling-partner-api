<?php

namespace Jasara\AmznSPA\Data\Requests\MerchantFulfillment;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\ShipmentRequestDetailsSchema;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\ShippingOfferingFilterSchema;

class GetEligibleShipmentServicesRequest extends BaseRequest
{
    public function __construct(
        public ShipmentRequestDetailsSchema $shipment_request_details,
        public ?ShippingOfferingFilterSchema $shipping_offering_filter = null,
    ) {
    }
}
