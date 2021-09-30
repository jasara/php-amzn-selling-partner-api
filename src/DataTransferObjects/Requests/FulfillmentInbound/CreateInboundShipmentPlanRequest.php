<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound;

use ArrayObject;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\InboundShipmentPlanRequestItemListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\InboundShipmentPlanRequestItemSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class CreateInboundShipmentPlanRequest extends DataTransferObject
{
    public AddressSchema $ship_from_address;

    #[StringEnumValidator(['SELLER_LABEL', 'AMAZON_LABEL_ONLY', 'AMAZON_LABEL_PREFERRED'])]
    public string $label_prep_preference;

    #[MaxLengthValidator(2)]
    public ?string $ship_to_country_code;

    public ?string $ship_to_country_subdivision_code;

    #[CastWith(ArrayCaster::class, itemType: InboundShipmentPlanRequestItemSchema::class)]
    public InboundShipmentPlanRequestItemListSchema $inbound_shipment_plan_request_items;

    public function toArrayObject(): ArrayObject
    {
        /** @var InboundShipmentPlanRequestItemListSchema $items */
        $items = $this->inbound_shipment_plan_request_items->map(function ($item) {
            return $item->toArrayObject();
        })->toArray();

        return new ArrayObject(array_filter([
            'ShipFromAddress' => $this->ship_from_address?->toArrayObject(),
            'LabelPrepPreference' => $this->label_prep_preference,
            'ShipToCountryCode' => $this->ship_to_country_code,
            'ShipToCountrySubdivisionCode' => $this->ship_to_country_subdivision_code,
            'InboundShipmentPlanRequestItems' => $items,
        ]));
    }
}
