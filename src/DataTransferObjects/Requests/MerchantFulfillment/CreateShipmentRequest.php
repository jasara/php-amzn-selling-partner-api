<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment\AdditionalSellerInputsListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment\LabelFormatOptionSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment\ShipmentRequestDetailsSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;

class CreateShipmentRequest extends BaseRequest
{
    public ShipmentRequestDetailsSchema $shipment_request_details;

    public string $shipping_service_id;

    public ?string $shipping_service_offer_id;

    #[StringEnumValidator(['None', 'LQHazmat'])]
     public ?string $hazmat_type;

    public ?LabelFormatOptionSchema $label_format_option;

    public ?AdditionalSellerInputsListSchema $shipment_level_seller_inputs_list;
}
