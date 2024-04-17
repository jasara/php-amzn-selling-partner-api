<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InboundShipmentPlanSchema extends BaseSchema
{
    public function __construct(
        public string $shipment_id,
        public string $destination_fulfillment_center_id,
        public AddressSchema $ship_to_address,
        #[StringEnumValidator(['NO_LABEL', 'SELLER_LABEL', 'AMAZON_LABEL'])]
        public string $label_prep_type,

        public InboundShipmentPlanItemListSchema $items,
        public ?BoxContentsFeeDetailsSchema $estimated_box_contents_fee,
    ) {
    }
}
