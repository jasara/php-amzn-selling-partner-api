<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class CreateInboundShipmentPlanRequest extends DataTransferObject
{
    public AddressSchema $ship_from_address;

    #[StringEnumValidator(['SELLER_LABEL', 'AMAZON_LABEL_ONLY', 'AMAZON_LABEL_PREFERRED'])]
    public string $label_prep_preference;

    #[MaxLengthValidator(2)]
    public ?string $ship_to_country_code;

    public ?string $ship_to_country_subdivision_code;

    public $inbound_shipment_plan_request_items;
}
