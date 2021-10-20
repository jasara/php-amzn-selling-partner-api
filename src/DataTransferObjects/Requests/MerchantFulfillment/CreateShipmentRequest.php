<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment\ShipmentRequestDetailsSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;

class CreateShipmentRequest extends BaseRequest
{
    public ShipmentRequestDetailsSchema $shipment_request_details;

    public ShippingServiceIdentifierSchema $shipping_service_id; //schema

    public ?string $shipping_service_offer_id;

    #[StringEnumValidator(['None', 'LQHazmat'])]
public ?string $hazmat_type;
}
