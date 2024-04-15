<?php

namespace Jasara\AmznSPA\Data\Requests\MerchantFulfillment;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\AdditionalSellerInputsListSchema;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\AdditionalSellerInputsSchema;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\LabelFormatOptionRequestSchema;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\ShipmentRequestDetailsSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CreateShipmentRequest extends BaseRequest
{
    public ShipmentRequestDetailsSchema $shipment_request_details;

    public string $shipping_service_id;

    public ?string $shipping_service_offer_id;

    #[StringEnumValidator(['None', 'LQHazmat'])]
    public ?string $hazmat_type;

    public ?LabelFormatOptionRequestSchema $label_format_option;

    #[CastWith(ArrayCaster::class, itemType: AdditionalSellerInputsSchema::class)]
    public ?AdditionalSellerInputsListSchema $shipment_level_seller_inputs_list;
}
