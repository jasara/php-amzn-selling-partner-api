<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound;

use Jasara\AmznSPA\Contracts\PascalCaseRequestContract;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\InboundShipmentPlanRequestItemListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\InboundShipmentPlanRequestItemSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CreateInboundShipmentPlanRequest extends BaseRequest implements PascalCaseRequestContract
{
    public AddressSchema $ship_from_address;

    #[StringEnumValidator(['SELLER_LABEL', 'AMAZON_LABEL_ONLY', 'AMAZON_LABEL_PREFERRED'])]
    public string $label_prep_preference;

    public ?string $ship_to_country_code;

    public ?string $ship_to_country_subdivision_code;

    #[CastWith(ArrayCaster::class, itemType: InboundShipmentPlanRequestItemSchema::class)]
    public InboundShipmentPlanRequestItemListSchema $inbound_shipment_plan_request_items;
}
