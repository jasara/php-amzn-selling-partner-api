<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class InboundShipmentPlanSchema extends DataTransferObject
{
    public string $shipment_id;

    public string $destination_fulfillment_center_id;

    public AddressSchema $ship_to_address;

    #[StringEnumValidator(['NO_LABEL', 'SELLER_LABEL', 'AMAZON_LABEL'])]
    public string $label_prep_type;

    #[CastWith(ArrayCaster::class, itemType: InboundShipmentPlanItemSchema::class)]
    public InboundShipmentPlanItemListSchema $items;

    public ?BoxContentsFeeDetailsSchema $estimated_box_contents_fee;
}
