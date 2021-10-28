<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment\ShipmentRequestDetailsSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment\ShippingOfferingFilterSchema;

class GetEligibleShipmentServicesRequest extends BaseRequest
{
    public ShipmentRequestDetailsSchema $shipment_request_details;

    public ?ShippingOfferingFilterSchema $shipping_offering_filter;
}
