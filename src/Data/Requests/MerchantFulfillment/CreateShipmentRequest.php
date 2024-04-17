<?php

namespace Jasara\AmznSPA\Data\Requests\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\AdditionalSellerInputsListSchema;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\LabelFormatOptionRequestSchema;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\ShipmentRequestDetailsSchema;

class CreateShipmentRequest extends BaseRequest
{
    public function __construct(
        public ShipmentRequestDetailsSchema $shipment_request_details,
        public string $shipping_service_id,
        public ?string $shipping_service_offer_id = null,
        #[StringEnumValidator(['None', 'LQHazmat'])]
        public ?string $hazmat_type = null,
        public ?LabelFormatOptionRequestSchema $label_format_option = null,

        public ?AdditionalSellerInputsListSchema $shipment_level_seller_inputs_list = null,
    ) {
    }
}
